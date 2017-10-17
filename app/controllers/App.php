<?php

namespace App;

use Sober\Controller\Controller;
use Inc2734\WP_Breadcrumbs;
use BCcampus\BootWalker;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'bcc-sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'bcc-sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'bcc-sage');
        }
        return get_the_title();
    }

    /**
     * get wp menu to act like bootstrap menu
     *
     * @return \BCcampus\BootWalker
     */
    public function navWalker(){
        return new BootWalker();
    }

    /**
     * robust breadcrumb functionality
     *
     * @return array
     */
    public function breadCrumbs() {
        $bc = new WP_Breadcrumbs\Breadcrumbs();

        return $bc->get();

    }

    public static function isProduction() {
        $url      = get_site_url( get_current_blog_id() );
        $host     = parse_url( $url, PHP_URL_HOST );
        $expected = array(
            'bccampus.ca',
            'etug.ca',
            'bctlc.ca',
        );

        // target subdomains
        $parts       = explode( '.', $host );
        $tld         = array_pop( $parts );
        $sld         = array_pop( $parts );
        $base_domain = $sld . '.' . $tld;

        if ( in_array( $base_domain, $expected ) && 'helga.bccampus.ca' !== $host ) {
            return true;
        }

        return false;
    }

    /**
     *
     */
    public function getMicroData() {
        global $post;
        $id          = $post->ID;
        $meta        = get_post( $id, ARRAY_A );
        $post_author = get_the_author_meta( 'display_name', $meta['post_author'] );
        $keywords = ( ! is_array( $meta['tags_input'] ) ) ? 'connect,collaborate,innovate' : implode( ',', $meta['tags_input'] );
        $excerpt     = ( is_front_page() ) ? get_bloginfo( 'description', 'display' ) : get_the_excerpt();

        // about
        if ( is_array( $meta['post_category'] ) && ! empty( $meta['post_category'] ) ) {
            foreach ( $meta['post_category'] as $cat ) {
                $result = get_category( $cat, ARRAY_A );
                if ( 'Uncategorized' != $result['cat_name'] ) {
                    $subject[] = $result['cat_name'];
                }
            }
            $categories = implode( ',', $subject );
        }

        $about = "Author: {$post_author}, Publication Date: {$meta['post_date']}, Excerpt:{$excerpt}, Categories: {$categories}";

        $micro_mapping = array(
            'author'                 => $post_author,
            'description'                  => $about,
            'dateModified'           => $meta['post_modified'],
            'datePublished'          => $meta['post_date'],
            'keywords'               => $keywords,
            'inLanguage'             => 'en',
            'name'                   => $meta['post_title'],
            'sourceOrganization' => 'BCcampus',
            'url'                    => get_permalink(),
        );

        return $micro_mapping;
    }


    /**
     * Useful in `wp_list_pages` to return different title if the
     * current post is tier2 in ancestor tree
     *
     * @param $id
     *
     * @return false|int|mixed|null|void
     */
    public static function getListHeading( $id ) {

        // see if the ID has a parent
        $parent_id = wp_get_post_parent_id( $id );

        // safety
        if( false === $parent_id ){
            $parent_id = $id;
        }

        // top of the tree, return id of front page
        if ( 0 == $parent_id ) {
            $parent_id = get_option( 'page_on_front' );
        }


        return $parent_id;

    }
}
