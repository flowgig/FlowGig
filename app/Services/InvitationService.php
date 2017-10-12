<?php

namespace App\Services;

use App\Invitation;
use App\User;

class InvitationService
{
    /**
     * Creates a new invitation TODO: and notifies the invited person
     *
     * @param $fields
     * @param $invitational
     * @param $creator
     * @return Invitation
     */
    public static function create($fields, $invitational, $creator)
    {
        $invitation = new Invitation();
        $invitation->creator()->associate($creator);
        $invitation->invitational()->associate($invitational);
        $invitation->fill($fields);

        if ($fields['invitee_id'] == null)
        {
            $invitee = User::whereEmail($fields['invitee_email'])->first();
            $invitation->invitee()->associate($invitee);
        }

        self::setPending($invitation); // Saves the new invitation

        // TODO: Notify the invited by e-mail
    }

    /**
     * Sets the invitation status to "pending"
     *
     * @param Invitation $invitation
     */
    public static function setPending(Invitation $invitation)
    {
        self::setStatus($invitation, Invitation::PENDING);
    }

    /**
     * Sets the invitation status to "accepted"
     *
     * @param Invitation $invitation
     */
    public static function setAccepted(Invitation $invitation)
    {
        self::setStatus($invitation, Invitation::ACCEPTED);
    }

    /**
     * Sets the invitation status to "declined"
     *
     * @param Invitation $invitation
     */
    public static function setDeclined(Invitation $invitation)
    {
        self::setStatus($invitation, Invitation::DECLINED);
    }

    /**
     * Sets the invitation status to "expired"
     *
     * @param Invitation $invitation
     */
    public static function setExpired(Invitation $invitation)
    {
        self::setStatus($invitation, Invitation::EXPIRED);
    }

    /**
     * Connects any invitations made by the email-address of the given user with that user
     *
     * @param $user
     */
    public static function identifyInvitationsForUser($user)
    {
        $invitationsForUser = Invitation::whereInviteeEmail($user->email)->get();

        $user->invitations()->saveMany($invitationsForUser);
    }

    private static function setStatus(Invitation $invitation, $status)
    {
        $invitation->status = $status;

        $invitation->save();
    }
}
