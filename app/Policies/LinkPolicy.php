<?php

namespace App\Policies;

use App\User;
use App\Link;
use Illuminate\Auth\Access\HandlesAuthorization;

class LinkPolicy
{
    use HandlesAuthorization;

    // Authorization for create song-links is checked in SongPolicy

    /**
     * Determine whether the user can update the link.
     *
     * @param  \App\User $user
     * @param  \App\Link $link
     * @return mixed
     */
    public function update(User $user, Link $link)
    {
        $band = $this->getBand($link);

        return $band->hasMember($user);
    }

    /**
     * Determine whether the user can delete the link.
     *
     * @param  \App\User $user
     * @param  \App\Link $link
     * @return mixed
     */
    public function delete(User $user, Link $link)
    {
        $band = $this->getBand($link);

        return $band->hasMember($user);
    }

    /**
     * Get the band indirectly owning the link.
     *
     * @param Link $link
     * @return mixed
     */
    private function getBand(Link $link)
    {
        switch (get_class($link->linkable)) {
            case 'App\\Song' :
                return $link->linkable->band;
            default :
                return null;
        }
    }
}
