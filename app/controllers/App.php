<?php

namespace App;

use BCcampus\BootWalker;
use Inc2734\WP_Breadcrumbs;
use Sober\Controller\Controller;

class App extends Controller {

	public function siteName() {
		return get_bloginfo( 'name' );
	}

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
	 * @return \BCcampus\BootWalker
	 */
	public function navWalker() {
		return new BootWalker();
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

	public function getChildrenOfPage( $id = '' ) {
		global $post;
		$id = (empty($id)) ? $post->ID : $id;
		$args = [
			'post_parent'    => intval( $id ),
			'post_type'      => 'page',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
			'order'          => 'DESC',
		];

		$children = get_children( $post->ID, $args );

		return $children;

	}

	/**
	 * Useful in `wp_list_pages` to switch context based on the existence of children
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
	 * @return false|int|mixed|null|void
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
}
