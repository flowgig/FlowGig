<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
     * The verification error view.
     *
     * @var string
     */
    protected $verificationErrorView = 'auth::verification::error';

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function getVerificationInfo()
    {
        if(Auth::user()->isVerified())
            redirect($this->redirectIfVerified);

        return view('auth.verification.info', Auth::user());
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendVerificationToken()
    {
        UserVerification::generate(Auth::user());
        UserVerification::send(Auth::user(), 'FlowGig account verification');

        return redirect()->route('email-verification.info');
    }
}
