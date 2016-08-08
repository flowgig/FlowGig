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
        'title', 'music_by', 'lyrics_by'
    ];

    /**
     * Get the band for the song.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }
}
