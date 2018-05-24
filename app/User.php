<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;
use Jrean\UserVerification\Traits\UserVerification;

class User extends Authenticatable
{
    use Notifiable;
    use UserVerification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bands()
    {
        return $this->belongsToMany('App\Band', 'band_memberships')->whereNull('band_memberships.deleted_at');
    }

    /**
     * Get all upcoming gigs for the user.
     */
    public function upcomingGigs()
    {
        $gigs = new Collection();

        foreach ($this->bands as $band)
            foreach ($band->upcomingGigs as $gig)
                $gigs->push($gig);

        return $gigs;
    }


    /**
     * Get all of the user's invitations.
     */
    public function invitations()
    {
        return $this->hasMany('App\Invitation', 'invitee_id');
    }
}
