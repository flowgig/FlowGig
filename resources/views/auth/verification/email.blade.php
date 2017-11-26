<p>A FlowGig user account is created with the e-mail address <b>{{ $user->email }}</b>.
    The account needs to be verified.</p>

<b>If you never registered for FlowGig, ignore this e-mail message.</b>

<p>Otherwise, please verify the account with this url:
    <a href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}">{{ $link }}</a>
</p>

<p>Kind regards, FlowGig developers.<br/>
    <small><a href="https://flowgig.com">https://flowgig.com</a></small>
</p>
