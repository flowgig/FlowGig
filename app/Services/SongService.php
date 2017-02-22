<?php

namespace App\Services;

use App\Song;

class SongService
{
    /**
     * Creates a new song for the given band
     *
     * @param $fields
     * @param $band
     * @param $creator
     * @return Song
     */
    public static function create($fields, $band, $creator)
    {
        $song = new Song();
        $song->creator()->associate($creator);
        $song->band()->associate($band);
        $song->fill($fields);
        $song->save();

        return $song;
    }
}
