<?php

namespace App\Policies;

use App\Song;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SongPolicy
{
    use HandlesAuthorization;

    // Authorization for create Song is checked in BandPolicy

    /**
     * Determine whether the user can view the song.
     *
     * @param  User $user
     * @param  Song $song
     * @return mixed
     */
    public function view(User $user, Song $song)
    {
        return $song->band->hasMember($user);
    }

    /**
     * Determine whether the user can update the song.
     *
     * @param  User $user
     * @param  Song $song
     * @return mixed
     */
    public function update(User $user, Song $song)
    {
        return $song->band->hasMember($user);
    }

    /**
     * Determine whether the user can delete the song.
     *
     * @param  User $user
     * @param  Song $song
     * @return mixed
     */
    public function delete(User $user, Song $song)
    {
        return $song->band->hasMember($user);
    }

    /**
     * Determine whether the user can add links to the song.
     *
     * @param  User $user
     * @param  Song $song
     * @return mixed
     */
    public function createSongLinks(User $user, Song $song)
    {
        return $song->band->hasMember($user);
    }
}
