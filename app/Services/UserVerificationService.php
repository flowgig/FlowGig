<?php

namespace App\Services;

use Jrean\UserVerification\Facades\UserVerification;

class UserVerificationService
{
    /**
     * Generates a verification token, stores it on the user and emails it to the user
     *
     * @param $user
     */
    public static function sendVerificationToken($user)
    {
        UserVerification::generate($user);
        UserVerification::send($user, 'FlowGig user account verification');
    }
}
