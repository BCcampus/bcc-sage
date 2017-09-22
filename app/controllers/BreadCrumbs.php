<?php

namespace App;

use Sober\Controller\Controller;

class Single extends Controller {
	/**
	 * Generates the breadcrumb for single posts
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
		$html = '<a class="breadcrumb-item" href=' . esc_url( home_url() ) . '>Home</a> ' . $cat_list;

		return $html;
	}
}