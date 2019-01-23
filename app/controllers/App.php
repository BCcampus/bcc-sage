<?php

namespace App;

use BCcampus\MegaWalker;
use Inc2734\WP_Breadcrumbs;
use Sober\Controller\Controller;

class App extends Controller {

	/**
	 * @return string|void
	 */
	public function siteName() {
		return get_bloginfo( 'name' );
	}

	/**
	 * @return bool|mixed|null|string|string[]|void
	 */
	public static function title() {
		if ( is_home() ) {
			$home = get_option( 'page_for_posts', true );
			if ( $home ) {
				return get_the_title( $home );
			}

			return __( 'Latest Posts', 'bcc-sage' );
		}
		if ( is_archive() ) {
			if ( is_category() ) {
				return __( 'News', 'bcc-sage' );
			} else {
				return get_the_archive_title();
			}
		}
		if ( is_search() ) {
			return sprintf( __( 'Search Results for %s', 'bcc-sage' ), get_search_query() );
		}
		if ( is_404() ) {
			return __( 'Not Found', 'bcc-sage' );
		}
		if ( is_singular( 'post' ) ) {
			return __( 'News', 'bcc-sage' );
		}

		return get_the_title();
	}

	/**
	 * get wp menu to act like bootstrap menu
	 *
	 */
	public function navWalker() {
		if ( class_exists( '\\BCcampus\MegaWalker' ) ) {
			return new MegaWalker();
		}
	}

	/**
	 * robust breadcrumb functionality
	 *
	 * @return array
	 */
	public function breadCrumbs() {
		$bc = new WP_Breadcrumbs\Breadcrumbs();

		return $bc->get();
	}

	/**
	 * Environment check
	 *
	 * @return bool
	 */
	public static function isProduction() {
		$url      = get_site_url( get_current_blog_id() );
		$host     = wp_parse_url( $url, PHP_URL_HOST );
		$expected = [
			'bccampus.ca',
			'etug.ca',
			'bctlc.ca',
		];

		// target subdomains
		$parts       = explode( '.', $host );
		$tld         = array_pop( $parts );
		$sld         = array_pop( $parts );
		$base_domain = $sld . '.' . $tld;

		if ( in_array( $base_domain, $expected, true ) && 'helga.bccampus.ca' !== $host ) {
			return true;
		}

		return false;
	}

	/**
	 * Prefers to find posts in the same category or tag and accesses a back up
	 * for those that have neither (pages)
	 *
	 * @param $post
	 * @param array $post_types
	 * @param string $limit
	 * @param string $category_name
	 *
	 * @return array
	 */
	public static function getRelevant( $post, $post_types = [], $limit = '', $category_name = '' ) {
		$append_c     = [];
		$append_t     = [];
		$more_related = [];
		$tags         = wp_get_post_tags( $post->ID );
		$cats         = wp_get_post_categories( $post->ID );
		$this_many    = ( empty( $limit ) ) ? 6 : $limit;
		$type         = ( empty( $post_types ) ) ? [
			'post',
			'page',
			'ai1ec',
		] : $post_types;

		if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) {
			$first_tag = $tags[0]->term_id;
			$append_t  = [ 'tag__in' => [ $first_tag ] ];
		}
		if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
			$first_cat = $cats[0];
			$append_c  = [ 'category__in' => [ $first_cat ] ];
		}

		$args = [
			'post__not_in'        => [ $post->ID ],
			'posts_per_page'      => $this_many * 3,
			'ignore_sticky_posts' => 1,
			'post_type'           => $type,
			'post_status'         => 'publish',
			'category_name'       => $category_name,
		];

		$maybe_more_args = array_merge( $args, $append_t );
		$maybe_more_args = array_merge( $maybe_more_args, $append_c );
		$related_posts   = get_posts( $maybe_more_args );
		$how_many        = count( $related_posts );

		if ( $how_many >= $this_many ) {
			shuffle( $related_posts );
			$slice = array_slice( $related_posts, 0, $this_many );
		} else {
			$new_limit = intval( $this_many ) - intval( $how_many );
			$more      = self::matchRelevant( $post, $post_types, $this_many, $new_limit );
			if ( $more ) {
				$only         = wp_list_pluck( $more, 'ID' );
				$more_related = get_posts(
					[
						'include'             => $only,
						'post__not_in'        => $post->ID,
						'post_status'         => 'publish',
						'post_type'           => $type,
						'ignore_sticky_posts' => 1,
					]
				);
			}

			$related = array_merge( $related_posts, $more_related );
			$slice   = array_slice( $related, 0, $this_many );

			shuffle( $slice );

		}

		return $slice;

	}

	/**
	 * Provides a mechanism to insert a default image if none exists
	 *
	 * @param $post_id
	 * @param array $size
	 *
	 * @return string
	 */
	public static function getThumb( $post_id, $size = [] ) {
		static $current_domain = null;
		if ( null === $current_domain ) {
			$current_domain = site_url();
		}

		$dimensions = ( empty( $size ) ) ? [ 175, 175 ] : $size;
		$result     = get_the_post_thumbnail( $post_id, $dimensions );
		if ( empty( $result ) ) {
			$src    = get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg';
			$result = "<img width='{$dimensions[0]}' height='{$dimensions[1]}' src='{$src}'/>";
		}

		return $result;
	}

	/**
	 * Returns the url of the post thumbnail, or default img url
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public static function getThumbUrl( $id = 0 ) {
		if ( 0 === $id ) {
			$post = get_post( 0 );
			$id   = $post->ID;
		}

		if ( has_post_thumbnail( $id ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' );
		} else {
			$image[] = get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg';
		}

		return $image[0];
	}

	/**
	 * Uses string values in post_title, post_content to find matches in DB
	 *
	 * @param $post
	 * @param array $post_types
	 * @param string $limit
	 *
	 * @return array|null|object
	 */
	public static function matchRelevant( $post, $post_types = [], $limit = '' ) {
		global $wpdb;

		$types        = ( empty( $post_types ) ) ? [
			'post',
			'page',
			'ai1ec',
		] : $post_types;
		$limits       = ( empty( $limit ) ) ? '6' : $limit;
		$now          = gmdate( 'Y-m-d H:i:s', ( time() + ( 3600 ) ) );
		$match_fields = 'post_title,post_content';
		$string       = $wpdb->prepare( '%s %s', $post->post_title, strip_tags( $post->post_content ) );
		$match        = $wpdb->prepare( ' AND MATCH (%s) AGAINST (%s) AS relevance', $match_fields, $string );
		$before       = $wpdb->prepare( " AND $wpdb->posts.post_date < %s ", $now );
		$from         = $wpdb->prepare( " AND $wpdb->posts.post_date >= %s ", gmdate( 'Y-m-d H:i:s', ( time() - ( YEAR_IN_SECONDS * 3 ) ) ) );
		$where        = " AND $wpdb->posts.post_status = 'publish' ";
		$where       .= " AND $wpdb->posts.post_type IN ('" . join( "', '", $types ) . "') ";
		$where       .= " AND $wpdb->posts.ID NOT IN ({$post->ID}) ";
		$orderby      = ' ORDER BY relevance DESC';
		$limited      = $wpdb->prepare( ' LIMIT %d, %d ', 0, $limits );

		$results = $wpdb->get_results( $wpdb->prepare( 'SELECT DISTINCT %s FROM %s WHERE 1 = 1 %s %s %s %s %s %s', $wpdb->posts . '.ID', $wpdb->posts, $match, $before, $from, $where, $limited, $orderby ) );

		return $results;

	}

	/**
	 * Schema.org microdata at WebPage level
	 *
	 * @return array
	 */
	public function getMicroData() {
		global $post;
		$id          = $post->ID;
		$meta        = get_post( $id, ARRAY_A );
		$post_author = get_the_author_meta( 'display_name', $meta['post_author'] );
		$keywords    = ( ! is_array( $meta['tags_input'] ) ) ? 'connect,collaborate,innovate' : implode( ',', $meta['tags_input'] );
		$excerpt     = ( is_front_page() ) ? get_bloginfo( 'description', 'display' ) : get_the_excerpt();
		$categories  = '';
		$subject     = [];

		// about
		if ( is_array( $meta['post_category'] ) && ! empty( $meta['post_category'] ) ) {
			foreach ( $meta['post_category'] as $cat ) {
				$result = get_category( $cat, ARRAY_A );
				if ( 'Uncategorized' !== $result['cat_name'] ) {
					$subject[] = $result['cat_name'];
				}
			}
			$categories = implode( ',', $subject );
		}

		$about = "Author: {$post_author}, Publication Date: {$meta['post_date']}, Excerpt:{$excerpt}, Categories: {$categories}";

		$micro_mapping = [
			'author'             => $post_author,
			'description'        => $about,
			'dateModified'       => $meta['post_modified'],
			'datePublished'      => $meta['post_date'],
			'keywords'           => $keywords,
			'inLanguage'         => 'en',
			'name'               => $meta['post_title'],
			'sourceOrganization' => 'BCcampus',
			'url'                => get_permalink(),
		];

		return $micro_mapping;
	}

	/**
	 * Useful in `wp_list_pages` to switch context based on the existence of
	 * children
	 *
	 * @param $id
	 *
	 * @return false|int
	 */
	public static function getChildOf( $id ) {
		// check for children
		$args = [
			'post_parent' => $id,
			'post_type'   => 'page',
			'post_status' => 'publish',
		];

		$children = get_children( $args, ARRAY_A );

		if ( empty( $children ) ) {
			$parent_id = wp_get_post_parent_id( $id );
		} else {
			$parent_id = $id;
		}

		return $parent_id;
	}

	/**
	 * Useful in `wp_list_pages` to return different title based on
	 * ancestry context
	 *
	 * @param $id
	 *
	 * @return string
	 */
	public static function getListHeading( $id ) {
		// check for children
		$args = [
			'post_parent' => $id,
			'post_type'   => 'page',
			'post_status' => 'publish',
		];

		$children  = get_children( $args );
		$parent_id = wp_get_post_parent_id( $id );

		// no sub-pages heading will be a parent
		if ( empty( $children ) ) {
			// top of the tree, return id of front page
			if ( 0 === $parent_id ) {
				$parent_id = get_option( 'page_on_front' );
			}

			$maybe_parent_title = get_the_title( $parent_id );
		} else {
			// heading will be current post
			$maybe_parent_title = get_the_title( $id );
		}

		$html = $maybe_parent_title;

		return $html;
	}

	/**
	 * @param $args
	 *
	 * @return array
	 */
	public static function getLatestNews( $args = [] ) {
		$sticky           = get_option( 'sticky_posts' );
		$posts_to_exclude = ( ! empty( $sticky ) ) ? array_values( $sticky ) : [];

		$defaults = [
			'posts_per_page' => 1,
			'post_status'    => 'publish',
			'exclude'        => $posts_to_exclude,
		];

		$r = wp_parse_args( $args, $defaults );

		$latest = get_posts( $r );

		return $latest;
	}

	/**
	 * Returns events in a specific event category
	 *
	 * @param array $args
	 * @param $event_category
	 *
	 * @return array
	 */
	public static function getEvents( $event_category, $args = [] ) {
		$defaults = [
			'posts_per_page' => 1,
			'post_status'    => 'publish',
			'exclude'        => [],
			'tax_query'      => [ //@codingStandardsIgnoreLine
				[
					'taxonomy' => 'events_categories',
					'field'    => 'name',
					'terms'    => $event_category,
				],
			],
		];

		$r = wp_parse_args( $args, $defaults );

		$events = get_posts( $r );

		return $events;
	}

	/**
	 * Cloodge of a function for poorly documented plugin
	 *
	 * @see https://gist.github.com/lukaspawlik/045dbd5b517a9eb1cf95
	 *
	 * @param int $limit
	 * @param array $ids
	 * @param bool $last_day
	 * @param $exclude_ids
	 *
	 * @return array|bool
	 */
	public static function getUpcomingEvents( $limit = 7, $ids = [], $last_day = false, $exclude_ids = [] ) {
		if ( ! class_exists( 'Ai1ec_Loader' ) ) {
			return false;
		}

		global $ai1ec_registry;
		$results           = [];
		$filter['cat_ids'] = $ids;
		$t                 = $ai1ec_registry->get( 'date.system' );
		// Get localized time
		$time          = $t->current_time();
		$event_results = $ai1ec_registry->get( 'model.search' )
										->get_events_relative_to( $time, $limit, '', $filter, $last_day );
		$dates         = $ai1ec_registry->get( 'view.calendar.view.agenda', $ai1ec_registry->get( 'http.request.parser' ) )
										->get_agenda_like_date_array( $event_results['events'] );

		foreach ( $dates as $date ) {
			foreach ( $date['events']['allday'] as $instance ) {
				$results[ $instance->get( 'instance_id' ) ]['title']        = $instance->get( 'post' )->post_title;
				$results[ $instance->get( 'instance_id' ) ]['link']         = $instance->get( 'post' )->guid;
				$results[ $instance->get( 'instance_id' ) ]['start']        = $date['month'] . ' ' . $date['day'] . ', ' . $date['year'];
				$results[ $instance->get( 'instance_id' ) ]['post_id']      = $instance->get( 'post' )->ID;
				$results[ $instance->get( 'instance_id' ) ]['post_content'] = $instance->get( 'post' )->post_content;
				$results[ $instance->get( 'instance_id' ) ]['location']     = $instance->get( 'address' );

			}
			foreach ( $date['events']['notallday'] as $instance ) {
				$results[ $instance->get( 'instance_id' ) ]['title']        = $instance->get( 'post' )->post_title;
				$results[ $instance->get( 'instance_id' ) ]['link']         = $instance->get( 'post' )->guid;
				$results[ $instance->get( 'instance_id' ) ]['start']        = $date['month'] . ' ' . $date['day'] . ', ' . $date['year'];
				$results[ $instance->get( 'instance_id' ) ]['post_id']      = $instance->get( 'post' )->ID;
				$results[ $instance->get( 'instance_id' ) ]['post_content'] = $instance->get( 'post' )->post_content;
				$results[ $instance->get( 'instance_id' ) ]['location']     = $instance->get( 'address' );
			}
		}

		// exclude certain ids
		if ( ! empty( $exclude_ids ) ) {
			foreach ( $exclude_ids as $exclude ) {
				if ( array_key_exists( $exclude, $results ) ) {
					unset( $results[ $exclude ] );
				}
			}
		}

		return $results;
	}

	/**
	 * @param array $cat_ids
	 *
	 * @return array|bool
	 */
	public static function getIdsInCategory( $cat_ids = [] ) {
		if ( ! class_exists( 'Ai1ec_Loader' ) ) {
			return false;
		}

		global $ai1ec_registry;
		$results           = [];
		$filter['cat_ids'] = $cat_ids;
		$t                 = $ai1ec_registry->get( 'date.system' );
		$last_day          = false;
		$limit             = 7;
		// Get localized time
		$time          = $t->current_time();
		$event_results = $ai1ec_registry->get( 'model.search' )
										->get_events_relative_to( $time, $limit, '', $filter, $last_day );
		$dates         = $ai1ec_registry->get( 'view.calendar.view.agenda', $ai1ec_registry->get( 'http.request.parser' ) )
										->get_agenda_like_date_array( $event_results['events'] );

		foreach ( $dates as $date ) {
			foreach ( $date['events']['allday'] as $instance ) {
				$results[ $instance->get( 'instance_id' ) ]['post_id'] = $instance->get( 'post' )->ID;
			}
			foreach ( $date['events']['notallday'] as $instance ) {
				$results[ $instance->get( 'instance_id' ) ]['post_id'] = $instance->get( 'post' )->ID;
			}
		}

		if ( ! empty( $results ) ) {
			$results = array_keys( $results );
		}

		return $results;
	}

	/**
	 * Content imported from other sites will have a permalink that leads back
	 * to the original site. This attempts to resolve that.
	 *
	 * @param int $id post_id
	 * @param string $name post_name
	 *
	 * @return string
	 */
	public static function maybeGuid( $id, $name ) {
		static $current_domain = null;
		if ( null === $current_domain ) {
			$current_domain = site_url();
		}
		$current = wp_parse_url( $current_domain, PHP_URL_HOST );

		$url      = esc_url( get_permalink( $id ) );
		$incoming = wp_parse_url( $url, PHP_URL_HOST );

		if ( 0 !== strcmp( $current, $incoming ) ) {
			$url = $current_domain . '/' . $name;
		}

		return $url;
	}

	/**
	 * Smooths out the uncertainty of whether or not there is an excerpt
	 *
	 * @param $id
	 * @param $content
	 * @param $link
	 * @param int $length
	 *
	 * @return string
	 */
	public static function maybeExcerpt( $id, $content, $link, $length = 15 ) {
		$maybe_excerpt = apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $id ) );
		$excerpt       = ( empty( $maybe_excerpt ) ) ? wp_trim_words( $content, $length, "<a href='{$link}'>&hellip;<span class='fa fa-arrow-right'></span></a>" ) : wp_trim_words( $maybe_excerpt, $length, "<a href='{$link}'>&hellip;<span class='fa fa-arrow-right'></span></a>" );

		return $excerpt;
	}
}

