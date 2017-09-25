@extends('layouts.noauth')

@section('title', 'Register')
@section('content')
    <div class="content">
        <form method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="login-box-header">
                <p>Register</p>
            </div>
            <div class="input-group">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus/>
                <label for="name">Name</label>
                @if ($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
            </div>
            <div class="input-group">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required/>
                <label for="email">E-Mail Address</label>
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
                <input id="password_confirmation" type="password" name="password_confirmation" required/>
                <label for="password_confirmation">Confirm Password</label>
                @if ($errors->has('password_confirmation'))
                    {{ $errors->first('password_confirmation') }}
                @endif
            </div>
            <div class="input-group">
                <button type="submit" class="button button-flat button-primary float-right">Register</button>
            </div>
        </form>
    </div>
@endsection