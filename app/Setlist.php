<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setlist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
    ];

    /**
     * Get the setlist songs for the setlist.
     */
    public function setlistSongs()
    {
        return $this->hasMany('App\SetlistSong');
    }

    /**
     * Get the band for the setlist.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }
}
