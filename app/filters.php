<?php

namespace App;

use RocketChatPhp;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );
    return template_path(locate_template(["views/{$comments_template}", $comments_template]) ?: $comments_template);
});

/**
 * The sage/display_sidebar filter can be used to define which conditions to enable the primary sidebar on.
 * https://github.com/roots/docs/blob/sage-9/sage/theme-sidebar.md#displaying-the-sidebar
 */
add_filter( 'sage/display_sidebar', function ( $display ) {
	static $display;

	isset( $display ) || $display = in_array( true, [
		// The sidebar will be displayed if any of the following return true
		is_page(),
		is_single(),
	] );

	return $display;
} );

/**
 * allows oembed to occur from BCcampus' Kaltura instance
 */
add_action( 'init', function () {
    wp_oembed_add_provider( 'https://video.bccampus.ca/id/*', 'https://video.bccampus.ca/oembed/', false );
} );

/**
 * Hooked into the save/update event of posts and pages
 * On that event, it sends notifications to an instance of Rocket Chat
 * and send emails.
 *
 * @param $id
 * @param $post
 */
function post_published_notification( $id, $post ) {

    // prevent firing on development servers
    if ( App::isProduction() === false ) {
        return;
    }

    $env = include( get_theme_file_path() . '/.env.php' );

    $author    = $post->post_author;
    $name      = get_the_author_meta( 'display_name', $author );
    $modified  = get_the_modified_author();
    $title     = $post->post_title;
    $permalink = get_permalink( $id );
    $to[]      = $env['rocket_chat']['EMAIL'];
    $subject   = sprintf( 'Published: %s', $title );
    $message   = sprintf( 'New content by %s modified by %s and titled “%s” has been published. ', $name, $modified, $title );
    $message   .= sprintf( ' View: %s', $permalink );
    $headers[] = '';

    // email notification
    wp_mail( $to, $subject, $message, $headers );

    // rocket chat notification
    $client = new RocketchatPhp\Client( $env['rocket_chat']['URL'], $env['rocket_chat']['KEY'] );
    $client->payload( [
        'text' => $message,
    ] );
}

add_action( 'publish_post', 'App\post_published_notification', 10, 2 );
add_action( 'publish_page', 'App\post_published_notification', 10, 2 );

/**
 * default is 55 words
 */
add_filter( 'excerpt_length', function ( $length ) {
    return 65;
}, 999 );

/**
 * At one point the site wasn't served over ssl
 */
add_filter( 'the_content', function ( $content ) {
    static $searches = array(
        '#<(?:img) .*?src=[\'"]\Khttp://[^\'"]+#i',
    );
    $content = preg_replace_callback( $searches, function ( $matches ) {
        return '' . substr( $matches[0], 5 );
    }, $content );

    return $content;
} );
