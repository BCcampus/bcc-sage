<?php

namespace App;

/**
 * TinyMCE add styles/classes to the styles dropdown menu
 */
add_filter( 'tiny_mce_before_init', function ( $settings ) {
    $style_formats             = array(
        array(
            'title'    => '[list]Byline',
            'block'    => 'ul',
            'classes'  => 'byline',
            'selector' => 'ul',
            'inline'   => 'li',
        ),
        array(
            'title'    => '[list]Override Feature Paragraph',
            'block'    => 'ul',
            'classes'  => 'inline',
            'selector' => 'ul,ol',
            'inline'   => 'li',
        ),
        array(
            'title'   => 'Notable Quote',
            'block'   => 'blockquote',
            'wrapper' => 'blockquote',
        ),
        array(
            'title'   => '[div]Alert Error',
            'block'   => 'div',
            'classes' => 'alert alert-danger',
            'wrapper' => 'div',
        ),
        array(
            'title'   => '[div]Alert Success',
            'block'   => 'div',
            'classes' => 'alert alert-success',
            'wrapper' => 'div',
        ),
        array(
            'title'   => '[div]Alert Info',
            'block'   => 'div',
            'classes' => 'alert alert-info',
            'wrapper' => 'div',
        ),
        array(
            'title'    => '[text]AlignLeft',
            'classes'  => 'text-left',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,li',
        ),
        array(
            'title'    => '[text]AlignRight',
            'classes'  => 'text-right',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,li',
        ),
        array(
            'title'    => '[text]AlignCentre',
            'classes'  => 'text-center',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,li',
        ),
        array(
            'title'    => 'Figure Left',
            'block'    => 'figure',
            'classes'  => 'pull-left',
            'selector' => 'figure',
        ),
        array(
            'title'    => 'Figure Right',
            'block'    => 'figure',
            'classes'  => 'pull-right',
            'selector' => 'figure',
        )
    );
    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
} );

/**
 * Apply styles to the visual editor
 */
add_filter( 'mce_css', function ( $url ) {
    if ( ! empty( $url ) ) {
        $url .= ',';
    }
    // Retrieves the plugin directory URL
    // Change the path here if using different directories
    $url .= get_theme_file_uri() . '/dist/styles/main.css';

    return $url;
} );

/**
 * Add "Styles" drop-down
 */
add_filter( 'mce_buttons_2', function ( $buttons ) {
    array_unshift( $buttons, 'styleselect' );

    return $buttons;
} );
