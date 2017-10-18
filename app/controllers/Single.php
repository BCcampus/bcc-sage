<?php

namespace App;

use Sober\Controller\Controller;

class Single extends Controller {
	/*
	 * Lists 5 post titles related to first tag on current post
	 */
	public function getRelatedPosts() {
		global $post;

		$tags          = wp_get_post_tags( $post->ID );
		$cats          = wp_get_post_categories( $post->ID );
		$first_cat     = $cats[0];
		$first_tag     = $tags[0]->term_id;
		$args          = array(
			'tag__in'             => array( $first_tag ),
			'post__not_in'        => array( $post->ID ),
			'posts_per_page'      => 5,
			'ignore_sticky_posts' => 1,
			'category__in'        => array( $first_cat ),
		);
		$related_posts = get_posts( $args );

		return $related_posts;
	}

    /**
     * Cloodge of a function for poorly documented plugin
     * @see https://gist.github.com/lukaspawlik/045dbd5b517a9eb1cf95
     *
     * @return mixed
     */
	public function getUpcomingEvents() {
	    if( ! class_exists( 'Ai1ec_Loader') ){
	        return false;
        }

        global $ai1ec_registry;

        $t = $ai1ec_registry->get( 'date.system' );

        // Get localized time
        $time = $t->current_time();
        $limit = 10;
        // 416 is cert, 192 is prod
        $filter = [
            'cat_ids' => [416,192]
        ];
        $event_results   = $ai1ec_registry->get( 'model.search' )->get_events_relative_to($time,$limit,'',$filter);
        $dates           = $ai1ec_registry->get('view.calendar.view.agenda', $ai1ec_registry->get( 'http.request.parser' ))->get_agenda_like_date_array( $event_results['events'] );

        foreach ( $dates as $date ) {
            foreach ( $date['events']['allday'] as $instance ) {
                $results[ $instance->get( 'instance_id' ) ]['title'] = $instance->get( 'post' )->post_title;
                $results[ $instance->get( 'instance_id' ) ]['link']  = $instance->get( 'post' )->guid;
                $results[ $instance->get( 'instance_id' ) ]['start'] = $date['weekday'] . ', ' . $date['month'] . ' ' . $date['day'] . ', ' . $date['year'];

            }
            foreach ( $date['events']['notallday'] as $instance ) {
                $results[ $instance->get( 'instance_id' ) ]['title'] = $instance->get( 'post' )->post_title;
                $results[ $instance->get( 'instance_id' ) ]['link']  = $instance->get( 'post' )->guid;
                $results[ $instance->get( 'instance_id' ) ]['start'] = $date['weekday'] . ', ' . $date['month'] . ' ' . $date['day'] . ', ' . $date['year'];
            }
        }

        return $results;
    }

}
