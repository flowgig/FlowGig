@extends('layouts.noauth')

@section('title', 'Register')
@section('content')

    <form method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}
        <div>
            <b>Register</b>
        </div>
        <div>
            <label for="name">Name</label><br/>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus/>
            @if ($errors->has('name'))
                {{ $errors->first('name') }}
            @endif
        </div>
        <div>
            <label for="email">E-Mail Address</label><br/>
            <input type="email" name="email" value="{{ old('email') }}" required/>
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
            <input type="password" name="password_confirmation" required/>
            @if ($errors->has('password_confirmation'))
                {{ $errors->first('password_confirmation') }}
            @endif
        </div>
        <div>
            <button type="submit" disabled>Register</button>
        </div>
    </form>

@endsection