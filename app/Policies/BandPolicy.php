<?php

namespace App\Policies;

use App\Band;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BandPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the band.
     *
     * @param  User $user
     * @param  Band $band
     * @return mixed
     */
    public function view(User $user, Band $band)
    {
        return $band->hasMember($user);
    }

    /**
     * Determine whether the user can create bands.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the band.
     *
     * @param  User $user
     * @param  Band $band
     * @return mixed
     */
    public function update(User $user, Band $band)
    {
        return $band->hasMember($user);
    }

    /**
     * Determine whether the user can delete the band.
     *
     * @param  User $user
     * @param  Band $band
     * @return mixed
     */
    public function delete(User $user, Band $band)
    {
        return $band->hasMember($user);
    }

    /**
     * Determine whether the user can create songs for the band.
     *
     * @param  User $user
     * @param  Band $band
     * @return mixed
     */
    public function createSongs(User $user, Band $band)
    {
        return $band->hasMember($user);
    }

    /**
     * Determine whether the user can create gigs for the band.
     *
     * @param  User $user
     * @param  Band $band
     * @return mixed
     */
    public function createGigs(User $user, Band $band)
    {
        return $band->hasMember($user);
    }

    /**
     * Determine whether the user can create setlists for the band.
     *
     * @param  User $user
     * @param  Band $band
     * @return mixed
     */
    public function createSetlists(User $user, Band $band)
    {
        return $band->hasMember($user);
    }


    /**
     * Determine whether the user can add members in the band.
     *
     * @param  User $user
     * @param  Band $band
     * @return mixed
     */
    public function addMembers(User $user, Band $band)
    {
        return $band->hasMember($user);
    }
}
