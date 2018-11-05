<?php

namespace App;

use Sober\Controller\Controller;

class Page extends Controller {

	/**
	 *
	 * @param string $id
	 *
	 * @param array $exclude
	 *
	 * @return array
	 */
	public static function getChildrenOfPage( $id = '', $exclude = [] ) {
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

		// exclude ids
		if ( ! empty( $exclude ) ) {
			foreach ( $exclude as $key ) {
				if ( array_key_exists( $key, $children ) ) {
					unset( $children[ $key ] );
				}
			}
		}

		return array_reverse( $children );

	}

}
