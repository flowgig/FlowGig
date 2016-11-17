<?php

namespace App\Policies;

use App\Gig;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GigPolicy
{
    use HandlesAuthorization;

    // Authorization for create Gig is checked in BandPolicy

    /**
     * Determine whether the user can view the gig.
     *
     * @param User $user
     * @param Gig $gig
     * @return mixed
     */
    public function view(User $user, Gig $gig)
    {
        return $gig->band->hasMember($user);
    }

    /**
     * Determine whether the user can update the gig.
     *
     * @param User $user
     * @param Gig $gig
     * @return mixed
     */
    public function update(User $user, Gig $gig)
    {
        return $gig->band->hasMember($user);
    }

    /**
     * Determine whether the user can delete the gig.
     *
     * @param User $user
     * @param Gig $gig
     * @return mixed
     */
    public function delete(User $user, Gig $gig)
    {
        return $gig->band->hasMember($user);
    }
}
