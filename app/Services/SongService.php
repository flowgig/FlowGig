<?php

namespace App\Services;

use App\Song;

class SongService
{
    /**
     * Creates a new song with required related models
     *
     * @param $fields
     * @param $band
     * @return Song
     */
    public static function create($fields, $band)
    {
        $song = new Song();

        $song->band()->associate($band);
        $song->fill($fields);
        $song->save();

        return $song;
    }
}
