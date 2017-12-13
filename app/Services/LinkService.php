<?php

namespace App\Services;

use App\Link;

class LinkService
{
    /**
     * Creates a new link
     *
     * @param $fields
     * @param $linkable
     * @param $creator
     * @return Link
     */
    public static function create($fields, $linkable, $creator)
    {
        $link = new Link();
        $link->creator()->associate($creator);
        $link->linkable()->associate($linkable);
        $link->fill($fields);
        $link->save();

        return $link;
    }
}
