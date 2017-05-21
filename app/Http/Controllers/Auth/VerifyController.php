<?php

namespace App\Http\Controllers\Auth;

use App\Services\UserVerificationService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Jrean\UserVerification\Facades\UserVerification;
use Jrean\UserVerification\Traits\VerifiesUsers;

class VerifyController extends Controller
{
    use VerifiesUsers;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectAfterVerification = '/dashboard';

    /**
     * Where to redirect users already verified.
     *
     * @var string
     */
    protected $redirectIfVerified = '/dashboard';

    /**
     * The verification error view name.
     *
     * @var string
     */
    protected $verificationErrorView = 'auth.verification.error';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the verification info view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVerificationInfo()
    {
        if(Auth::user()->isVerified())
            redirect($this->redirectIfVerified);

        return view('auth.verification.info', Auth::user());
    }

    /**
     * Send verification e-mail to user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendVerificationToken()
    {
        UserVerificationService::sendVerificationToken(Auth::user());

        // TODO: Flash verification e-mail sent

        return redirect()->route('email-verification.info');
    }
}
