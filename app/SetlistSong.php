<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetlistSong extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setlist_id', 'song_id', 'number_in_list', 'key', 'bpm', 'duration', 'intensity', 'comment'
    ];

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['setlist'];


    /**
     * Get the creator of the setlist song
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the updater of the setlist song
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

     /**
     * Get the setlist for the setlist song.
     */
    public function setlist()
    {
        return $this->belongsTo('App\Setlist');
    }

    /**
     * Get the song for the setlist song.
     */
    public function song()
    {
        return $this->belongsTo('App\Song');
    }
}
