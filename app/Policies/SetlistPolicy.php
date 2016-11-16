<?php

namespace App\Policies;

use App\Setlist;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SetlistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the setlist.
     *
     * @param User $user
     * @param Setlist $setlist
     * @return mixed
     */
    public function view(User $user, Setlist $setlist)
    {
        return $setlist->gig->band->hasMember($user);
    }

    /**
     * Determine whether the user can create setlists.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the setlist.
     *
     * @param User $user
     * @param Setlist $setlist
     * @return mixed
     */
    public function update(User $user, Setlist $setlist)
    {
        return $setlist->gig->band->hasMember($user);
    }

    /**
     * Determine whether the user can export the setlist.
     *
     * @param User $user
     * @param Setlist $setlist
     * @return mixed
     */
    public function export(User $user, Setlist $setlist)
    {
        return $setlist->gig->band->hasMember($user);
    }

    /**
     * Determine whether the user can delete the setlist.
     *
     * @param User $user
     * @param Setlist $setlist
     * @return mixed
     */
    public function delete(User $user, Setlist $setlist)
    {
        return $setlist->gig->band->hasMember($user);
    }
}
