<?php

namespace App;

use Sober\Controller\Controller;

class Page extends Controller {

	/**
	 *
	 * @param string $id
	 *
	 * @return array
	 */
	public static function getChildrenOfPage( $id = '' ) {
		global $post;
		$id   = ( empty( $id ) ) ? $post->ID : $id;
		$args = [
			'post_parent'    => intval( $id ),
			'post_type'      => 'page',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
			'order'          => 'DESC',
		];

		$children = get_children( $id, $args );

		return array_reverse($children);

	}

}
