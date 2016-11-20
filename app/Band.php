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
     * Get the the band members.
     */
    public function members()
    {
        return $this->belongsToMany('App\User', 'band_memberships');
    }

    /**
     * Get the the band memberships.
     */
    public function memberships()
    {
        return $this->hasMany('App\BandMembership');
    }

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
     * Get the gigs, with setlist, for the band.
     */
    public function gigsWithSetlist()
    {
        return $this->gigs()->has('setlist');
    }

    /**
     * Get the system gig for the band.
     */
    public function systemGig()
    {
        return $this->gigs()->whereName('_system_')->first();
    }

    /**
     * Determine whether the given user is a member in the band.
     * @param User $user
     * @return bool
     */
    public function hasMember($user)
    {
        return $this->memberships()->whereUserId($user->id)->exists();
    }
}
