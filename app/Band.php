<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the songs for the band.
     */
    public function songs()
    {
        return $this->hasMany('App\Song');
    }

    /**
     * Get the gigs for the band.
     */
    public function gigs()
    {
        return $this->hasMany('App\Gig');
    }

    /**
     * Get the setlists for the band.
     */
    public function setlists()
    {
        return $this->hasMany('App\Setlist');
    }
}
