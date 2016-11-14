<?php

namespace App\Policies;

use App\BandMembership;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BandMembershipPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the band membership.
     *
     * @param User $user
     * @param BandMembership $bandMembership
     * @return mixed
     */
    public function view(User $user, BandMembership $bandMembership)
    {
        return $bandMembership->band->hasMember($user);
    }

    /**
     * Determine whether the user can create band memberships.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the band membership.
     *
     * @param User $user
     * @param BandMembership $bandMembership
     * @return mixed
     */
    public function update(User $user, BandMembership $bandMembership)
    {
        $bandMembership->band->hasMember($user);
    }

    /**
     * Determine whether the user can delete the band membership.
     *
     * @param User $user
     * @param BandMembership $bandMembership
     * @return mixed
     */
    public function delete(User $user, BandMembership $bandMembership)
    {
        $bandMembership->band->hasMember($user);
    }
}
