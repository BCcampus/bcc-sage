<?php

namespace App;

use Sober\Controller\Controller;

class Singular extends Controller {
    /**
     * Get ID of the parent at the top of the tree
     *
     * @param $id
     *
     * @return mixed
     */
    public static function getParentId( $id ) {

        // see if the ID has a parent
        $parent_id = wp_get_post_parent_id( $id );

        if ( false == $parent_id ) {
            $ancestors = get_post_ancestors( $id );
            $parent_id = array_pop( $ancestors );
        }

        return $parent_id;

    }

}
