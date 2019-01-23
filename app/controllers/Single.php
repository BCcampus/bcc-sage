<?php

namespace App;

use Sober\Controller\Controller;

class Single extends Controller {

	/**
	 * Lists 5 post titles related to first tag on current post
	 *
	 * @return array
	 */
	public function getRelatedPosts() {
		global $post;
		$append_c = [];
		$append_t = [];
		$tags     = wp_get_post_tags( $post->ID );
		$cats     = wp_get_post_categories( $post->ID );

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
			'posts_per_page'      => 5,
			'ignore_sticky_posts' => 1,
		];

		$maybe_more_args = array_merge( $args, $append_t );
		$maybe_more_args = array_merge( $maybe_more_args, $append_c );
		$related_posts   = get_posts( $maybe_more_args );

		return $related_posts;
	}

}
