<?php

namespace App;

use Sober\Controller\Controller;

class FrontPage extends Controller
{

    public function getLatestNews(){
        $args = array(
            'posts_per_page' => 1,
            'category_name' => 'Homepage',
            'post_status' => 'publish',
            'order' => 'DESC',
            'post__in' => get_option( 'sticky_posts' ),
        );
        $latest = get_posts( $args );

        return $latest;
    }

}
