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
        'number_in_list', 'setnumber', 'key', 'energy', 'duration', 'comment'
    ];

    /**
     * Get the song for the setlist song.
     */
    public function song()
    {
        return $this->belongsTo('App\Song');
    }
}
