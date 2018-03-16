@extends('layouts.noauth')

@section('title', 'Reset password')
@section('content')
    <div class="content">
        <form method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="login-box-header">
                <p>Reset password</p>
            </div>
            <div class="input-group">
                <input id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus/>
                <label for="email">E-mail address</label>
                @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
            </div>
            <div class="input-group">
                <input id="password" type="password" name="password" required/>
                <label for="password">Password</label>
                @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
            </div>
            <div class="input-group">
                <input id="password-confirm" type="password" name="password_confirmation" required/>
                <label for="password-confirm">Confirm password</label>
                @if ($errors->has('password_confirmation'))
                    {{ $errors->first('password_confirmation') }}
                @endif
            </div>
            <div class="input-group">
                <button type="submit" class="button button-flat button-primary float-right">Reset password</button>
            </div>
        </form>
    </div>
@endsection
