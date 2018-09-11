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
			if ( $home = get_option( 'page_for_posts', true ) ) {
				return get_the_title( $home );
			}

			return __( 'Latest Posts', 'bcc-sage' );
		}
		if ( is_archive() ) {
			return get_the_archive_title();
		}
		if ( is_search() ) {
			return sprintf( __( 'Search Results for %s', 'bcc-sage' ), get_search_query() );
		}
		if ( is_404() ) {
			return __( 'Not Found', 'bcc-sage' );
		}

		return get_the_title();
	}

	/**
	 * get wp menu to act like bootstrap menu
	 *
	 */
	public function navWalker() {
		if (class_exists('\\BCcampus\MegaWalker')) {
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
		$host     = parse_url( $url, PHP_URL_HOST );
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

		if ( in_array( $base_domain, $expected ) && 'helga.bccampus.ca' !== $host ) {
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
	 * @param string $tag
	 *
	 * @return array
	 */
	public static function getRelevant( $post, $post_types = [], $limit = '', $tag = '' ) {
		$tags         = wp_get_post_tags( $post->ID );
		$cats         = wp_get_post_categories( $post->ID );
		$first_cat    = $cats[0];
		if ( empty( $tag ) ) {
			$first_tag = $tags[0]->term_id;
		} else {
			$term       = get_term_by( 'name', $tag, 'post_tag', ARRAY_A );
			$first_tag = $term['term_id'];
		}
		$type         = ( empty( $post_types ) ) ? [
			'post',
			'page',
			'ai1ec',
		] : $post_types;
		$this_many    = ( empty( $limit ) ) ? 6 : $limit;
		$more_related = [];
		$args         = [
			'tag__in'             => [ $first_tag ],
			'post__not_in'        => [ $post->ID ],
			'posts_per_page'      => $this_many,
			'ignore_sticky_posts' => 1,
			'category__in'        => [ $first_cat ],
			'post_type'           => $type,
			'post_status'         => 'publish',
		];

		$related_posts = get_posts( $args );

		if ( count( $related_posts ) >= $this_many ) {
			return $related_posts;
		} else {
			$more = self::matchRelevant( $post, $post_types, $this_many );
			if ( $more ) {
				$slice        = array_slice( $more, 0, $this_many );
				$only         = wp_list_pluck( $slice, 'ID' );
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

			return array_slice( $related, 0, $this_many );
		}

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

		$dimensions = ( empty( $size ) ) ? [ 175,175 ] : $size;
		$result     = get_the_post_thumbnail( $post_id, $dimensions );
		if ( empty( $result ) ) {
			$src    = get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg';
			$result = "<img width='{$dimensions[0]}' height='{$dimensions[1]}' src='{$src}'/>";
		}

		return $result;
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
		$string       = $post->post_title . ' ' . $post->post_content;
		$match        = $wpdb->prepare( ' AND MATCH (' . $match_fields . ") AGAINST ('%s') ", $string );
		$before       = $wpdb->prepare( " AND $wpdb->posts.post_date < '%s' ", $now );
		$from         = $wpdb->prepare( " AND $wpdb->posts.post_date >= '%s' ", gmdate( 'Y-m-d H:i:s', ( time() - ( YEAR_IN_SECONDS * 3 ) ) ) );
		$where        = " AND $wpdb->posts.post_status = 'publish' ";
		$where        .= " AND $wpdb->posts.post_type IN ('" . join( "', '", $types ) . "') ";
		$where        .= " AND $wpdb->posts.ID NOT IN ({$post->ID}) ";
		$limited      = $wpdb->prepare( ' LIMIT %d, %d ', 0, $limits );

		$sql = "SELECT DISTINCT $wpdb->posts.ID FROM $wpdb->posts WHERE 1=1 $match $before $from $where $limited";

		$results = $wpdb->get_results( $sql );

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

		// about
		if ( is_array( $meta['post_category'] ) && ! empty( $meta['post_category'] ) ) {
			foreach ( $meta['post_category'] as $cat ) {
				$result = get_category( $cat, ARRAY_A );
				if ( 'Uncategorized' != $result['cat_name'] ) {
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
		$defaults = [
			'posts_per_page' => 1,
			'post_status'    => 'publish',
			'exclude'        => [],
		];

		$r = wp_parse_args( $args, $defaults );

		$latest = get_posts( $r );

		return $latest;
	}
}
