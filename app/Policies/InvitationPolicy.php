<?php

namespace App\Policies;

use App\User;
use App\Invitation;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvitationPolicy
{
    use HandlesAuthorization;

    // Authorization for create Invitation is checked in BandPolicy

    /**
     * Determine whether the user can accept the invitation.
     *
     * @param  \App\User $user
     * @param  \App\Invitation $invitation
     * @return bool
     */
    public function accept(User $user, Invitation $invitation)
    {
        return $invitation->invitee->is($user);
    }

    /**
     * Determine whether the user can decline the invitation.
     *
     * @param  \App\User $user
     * @param  \App\Invitation $invitation
     * @return bool
     */
    public function decline(User $user, Invitation $invitation)
    {
        return $invitation->invitee->is($user);
    }

    /**
     * Determine whether the user can set the invitation expired.
     *
     * @param  \App\User $user
     * @param  \App\Invitation $invitation
     * @return bool
     */
    public function setExpired(User $user, Invitation $invitation)
    {
        if ($invitation->isFor('band'))
            $band = $invitation->invitational;
        elseif ($invitation->isFor('gig'))
            $band = $invitation->invitational->band;
        else return false;

        return $band->hasMember($user);
    }
}
