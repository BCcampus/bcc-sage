<?php

namespace App;

/**
 * Theme customizer
 */
add_action(
	'customize_register', function ( \WP_Customize_Manager $wp_customize ) {
		// Add postMessage support
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->selective_refresh->add_partial(
			'blogname', [
				'selector' => '.brand',
				'render_callback' => function () {
					bloginfo( 'name' );
				},
			]
		);
	}
);

/**
 * Customizer JS
 */
add_action(
	'customize_preview_init', function () {
		wp_enqueue_script( 'sage/customizer.js', asset_path( 'scripts/customizer.js' ), [ 'customize-preview' ], null, true );
	}
);

/**
 *  Adds a slider ID setting in the customizer "Homepage Settings" section
 */

add_action(
	'customize_register', function ( \WP_Customize_Manager $wp_customize ) {

		$wp_customize->add_setting(
			'slider_setting', [
				'default'    => '',
				'capability' => 'edit_theme_options',

			]
		);

		$wp_customize->add_control(
			'slider_id', [
				'label'    => __( 'Slider ID', __NAMESPACE__ ),
				'section'  => 'static_front_page',
				'settings' => 'slider_setting',
			]
		);
	}
);

/**
 * Stores Post ID of 'Topics of Practice' in Homepage Settings
 */
add_action(
	'customize_register', function ( \WP_Customize_Manager $wp_customize ) {

		$wp_customize->add_setting(
			'topics_of_practice_setting', [
				'default'    => '',
				'capability' => 'edit_theme_options',

			]
		);

		$wp_customize->add_control(
			'topics_of_practice_id', [
				'label'    => __( 'Topics of Practice Post ID', __NAMESPACE__ ),
				'section'  => 'static_front_page',
				'settings' => 'topics_of_practice_setting',
			]
		);
	}
);

/**
 * Stores Post ID of 'Projects' in Homepage Settings
 */
add_action(
	'customize_register', function ( \WP_Customize_Manager $wp_customize ) {

		$wp_customize->add_setting(
			'projects_setting', [
				'default'    => '',
				'capability' => 'edit_theme_options',

			]
		);

		$wp_customize->add_control(
			'projects_id', [
				'label'    => __( 'Projects Post ID', __NAMESPACE__ ),
				'section'  => 'static_front_page',
				'settings' => 'projects_setting',
			]
		);
	}
);
