<?php

namespace App;

use Sober\Controller\Controller;

class BreadCrumbs extends Controller {

	/**
	 * Generates breadcrumb for category archives
	 * @return string
	 */
	public function catCrumb() {
		$html = '<a class="breadcrumb-item" href=' . esc_url( home_url() ) . '>Home</a>' . '<span class="breadcrumb-item">' . single_cat_title( '', false ) . '</span>';

		return $html;
	}

	/**
	 * Generates breadcrumb for single posts
	 * @return string
	 */
	public function postCrumb() {
		// Build category links manually to add custom breadcrumb class
		$cat_list  = '';
		$cat_count = 0;
		foreach ( get_the_category() as $category ) {
			$cat_list .= '<a class="breadcrumb-item" href=' . esc_url( get_category_link( $category->term_id ) ) . '>' . $category->name . '</a>';
			$cat_count ++;
		}
		$html = '<a class="breadcrumb-item" href=' . esc_url( home_url() ) . '>Home</a>' . $cat_list;

		return $html;
	}

	/**
	 * Generates breadcrumb for pages
	 * @return string
	 */

	public function pageCrumb() {
		global $post;
		if ( $post->post_parent ) {
			$html = '<a class="breadcrumb-item" href=' . esc_url( home_url() ) . '>Home</a>' . '<a class="breadcrumb-item" href="' . esc_url( get_permalink( $post->post_parent ) ) . '">' . apply_filters( 'the_title', get_the_title( $post->post_parent ) ) . '</a>' . '<span class="breadcrumb-item">' . get_the_title() . '</span>';
		} else {
			$html .= '<a class="breadcrumb-item" href=' . esc_url( home_url() ) . '>Home</a><span class="breadcrumb-item">' . get_the_title() . '</span>';
		}

		return $html;
	}


}