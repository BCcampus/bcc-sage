<?php

namespace App;

use Sober\Controller\Controller;

class FrontPage extends Controller {


	public function getLatestNews() {
		$args   = [
			'posts_per_page' => 1,
			'category_name'  => 'Homepage',
			'post_status'    => 'publish',
			'order'          => 'DESC',
			'post__in'       => get_option( 'sticky_posts' ),
		];
		$latest = get_posts( $args );

		return $latest;
	}

	/**
	 * Returns the short-code with the slider ID attribute the user set in the
	 * customizer menu Works with Smart Slider 3 plugin
	 *
	 * @return string
	 */
	public function getSliderId() {
		$id = get_theme_mod( 'slider_setting', '' );

		$slider = do_shortcode( '[smartslider3 slider=' . $id . ']' );

		return $slider;
	}

	/**
	 * Returns ID value of T.O.P. page set in the customizer menu
	 *
	 * @return string
	 */
	public function getTopicsOfPracticeId() {
		$id = get_theme_mod( 'topics_of_practice_setting', '' );

		return $id;
	}

	/**
	 * Returns ID value of Projects page set in the customizer menu
	 *
	 * @return string
	 */
	public function getProjectsId() {
		$id = get_theme_mod( 'projects_setting', '' );

		return $id;
	}
}
