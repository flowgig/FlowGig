<?php

namespace App\Services;

use App\SetlistSong;
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

        $defaultSetlistSong = new SetlistSong();
        $defaultSetlistSong->song()->associate($song);
        $defaultSetlist = $song->band->systemGig()->setlist;
        $defaultSetlistSong->setlist()->associate($defaultSetlist);
        $defaultSetlistSong->fill($fields);
        $defaultSetlistSong->number_in_list = 0;
        $defaultSetlistSong->save();

        return $song;
    }
}