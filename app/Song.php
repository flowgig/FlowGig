<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
    public function getSetlistDefaults()
    {
        $defaultSetlistSong = $this->getDefaultSetlistSong();

        if ($defaultSetlistSong != null) {
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

    /**
     * Set the default setlist properties for the song.
     *
     * @param $setlistDefaults
     * @return array
     */
    public function setSetlistDefaults($setlistDefaults)
    {
        $defaultSetlistSong = $this->getDefaultSetlistSong();

        if ($defaultSetlistSong != null) {
            $defaultSetlistSong->update(
                [
                    'key' => $setlistDefaults['key'],
                    'bpm' => $setlistDefaults['bpm'],
                    'duration' => $setlistDefaults['duration'],
                    'intensity' => $setlistDefaults['intensity'],
                    'comment' => $setlistDefaults['comment']
                ]
            );
        }
    }

    private function getDefaultSetlistSong()
    {
        return $this->band->systemGig()->setlist->setlistSongs()->whereSongId($this->id)->first();
    }
}
