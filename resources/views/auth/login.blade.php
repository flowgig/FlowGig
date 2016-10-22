@extends('layouts.noauth')

@section('title', 'Log in')
@section('content')

    <form method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div>
            <b>Log in</b>
        </div>
        <div>
            <label for="email">E-Mail Address</label><br/>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus/><br/>
            @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
        </div>
        <div>
            <label for="password">Password</label><br/>
            <input type="password" name="password" required/><br/>
            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </div>
        <div>
            <label><input type="checkbox" name="remember"> Remember Me</label><br/>
            <button type="submit">Login</button>
        </div>
        <div>
            <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
        </div>
    </form>

@endsection