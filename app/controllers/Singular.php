<?php

namespace App;

use Sober\Controller\Controller;

class Singular extends Controller
{
    /**
     * Get ID of the parent at the top of the tree
     *
     * @param $id
     *
     * @return mixed
     */
    public static function getParentId( $id ) {

    $ancestors = get_post_ancestors( $id );

    return array_pop($ancestors);

    }

}
