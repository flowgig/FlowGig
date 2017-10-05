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
     * Get the creator of the band
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the updater of the band
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    /**
     * Get the the band members.
     */
    public function members()
    {
        return $this->belongsToMany('App\User', 'band_memberships')->wherePivot('deleted_at', null)->withTimestamps();
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
        return $this->gigs()->has('setlist')->orderBy('date', 'desc');
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

    /**
     * Get all of the band's invitations.
     */
    public function invitations()
    {
        return $this->morphMany('App\Invitation', 'invitational');
    }
}
