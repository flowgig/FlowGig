<?php

namespace App\Policies;

use App\SetlistSong;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SetlistSongPolicy
{
    use HandlesAuthorization;

    // Authorization for create SetlistSong is checked in BandPolicy

    /**
     * Determine whether the user can update the setlistSong.
     *
     * @param User $user
     * @param SetlistSong $setlistSong
     * @return mixed
     */
    public function update(User $user, SetlistSong $setlistSong)
    {
        return $setlistSong->setlist->gig->band->hasMember($user);
    }

    /**
     * Determine whether the user can delete the setlistSong.
     *
     * @param User $user
     * @param SetlistSong $setlistSong
     * @return mixed
     */
    public function delete(User $user, SetlistSong $setlistSong)
    {
        return $setlistSong->setlist->gig->band->hasMember($user);
    }
}
