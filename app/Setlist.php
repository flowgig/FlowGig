<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setlist extends Model
{
    /**
     * Get the setlist songs for the setlist.
     */
    public function setlistSongs()
    {
        return $this->hasMany('App\SetlistSong');
    }

    /**
     * Get the gig for the setlist.
     */
    public function gig()
    {
        return $this->belongsTo('App\Gig');
    }
}
