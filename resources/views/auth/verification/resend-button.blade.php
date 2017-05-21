<form action="{{ route('email-verification.send-token') }}" method="POST">
    {{ csrf_field() }}
    <button type="submit" class="button button-default">Resend verification e-mail</button>
</form>
