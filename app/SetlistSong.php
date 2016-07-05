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
        'setlist_id', 'song_id', 'number_in_list', 'setnumber', 'key', 'energy', 'duration', 'comment'
    ];

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
