<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'artist', 'music_by', 'lyrics_by'
    ];

    /**
     * Get the band for the song.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }

    /**
     * Get the default setlist properties for the song, if any.
     *
     * @return array
     */
    public function setlistDefaults()
    {
        $defaultSetlistSong = $this->band->systemGig()->setlist->setlistSongs()->whereSongId($this->id)->first();

        if($defaultSetlistSong != null)
        {
            return [
                'key' => $defaultSetlistSong->key,
                'bpm' => $defaultSetlistSong->bpm,
                'duration' => $defaultSetlistSong->duration,
                'intensity' => $defaultSetlistSong->intensity,
                'comment' => $defaultSetlistSong->comment
            ];
        }

        return [];
    }
}
