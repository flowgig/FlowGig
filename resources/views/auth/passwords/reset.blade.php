@extends('layouts.noauth')

@section('title', 'Reset Password')
@section('content')

    <form method="POST" action="{{ url('/password/reset') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <b>Reset Password</b>
        </div>
        <div>
            <label for="email">E-Mail Address</label><br/>
            <input id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus/>
            @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
        </div>
        <div>
            <label for="password">Password</label><br/>
            <input id="password" type="password" name="password" required/>
            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </div>
        <div>
            <label for="password-confirm">Confirm Password</label><br/>
            <input id="password-confirm" type="password" name="password_confirmation" required/>
            @if ($errors->has('password_confirmation'))
                {{ $errors->first('password_confirmation') }}
            @endif
        </div>
        <div>
            <button type="submit">Reset Password</button>
        </div>
    </form>

@endsection
