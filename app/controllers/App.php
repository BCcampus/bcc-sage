<?php

namespace App;

use Sober\Controller\Controller;
use Inc2734\WP_Breadcrumbs;

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
     *
     * @return array
     */
    public static function breadCrumbs() {
        $bc = new WP_Breadcrumbs\Breadcrumbs();

        return $bc->get();

    }
}
