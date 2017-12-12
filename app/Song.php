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
        'title', 'artist', 'music_by', 'lyrics_by', 'key', 'bpm', 'duration', 'intensity'
    ];

    /**
     * Get the creator of the song
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the updater of the song
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    /**
     * Get the band for the song.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }

    /**
     * Get the links for the song.
     */
    public function links()
    {
        return $this->morphMany('App\Link', 'linkable');
    }
}

