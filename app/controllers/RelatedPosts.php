<?php

namespace App;

use Sober\Controller\Controller;

class RelatedPosts extends Controller {
	/*
	 * Lists 5 post titles related to first tag on current post
	 */
	public function getRelatedPosts() {
		$tags          = wp_get_post_tags( $post->ID );
		$cats          = wp_get_post_categories( $post->ID );
		$first_cat     = $cats[0];
		$first_tag     = $tags[0]->term_id;
		$args          = array(
			'tag__in'             => array( $first_tag ),
			'post__not_in'        => array( $post->ID ),
			'posts_per_page'      => 5,
			'ignore_sticky_posts' => 1,
			'category__in'        => array( $first_cat ),
		);
		$related_posts = get_posts( $args );

		return $related_posts;
	}
}