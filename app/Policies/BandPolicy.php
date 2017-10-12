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
     * Determine whether the user can create setlist-songs for the band.
     *
     * @param  User $user
     * @param  Band $band
     * @return mixed
     */
    public function createSetlistSongs(User $user, Band $band)
    {
        return $band->hasMember($user);
    }

    /**
     * Determine whether the user can invite members to the band.
     *
     * @param  User $user
     * @param  Band $band
     * @return mixed
     */
    public function inviteMembers(User $user, Band $band)
    {
        return $band->hasMember($user);
    }
}
