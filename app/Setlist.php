<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setlist extends Model
{
    /**
     * Get the creator of the setlist
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the updater of the setlist
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

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
