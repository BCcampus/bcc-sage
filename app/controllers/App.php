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
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
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

        if ( in_array( $base_domain, $expected ) ) {
            return true;
        }

        return false;
    }

    /**
     * Weak attempt to differentiate descriptions for different pages
     *
     * @return string|void
     */
    public function getMetaDescription() {
        $meta = get_the_excerpt();

        if ( is_front_page() ) {
            $meta = get_bloginfo( 'description', 'display' );
        }

        return $meta;
    }
}
