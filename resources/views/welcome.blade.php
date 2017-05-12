@extends('layouts.noauth')
@section('title', 'Welcome')
@section('content')
    <login-form></login-form>
    {{--
    <div class="content">
        <div class="input-group">
            <input id="username" type="text"/><label for="username">Username</label>
        </div>
        <div class="input-group">
            <input id="password" type="password"/><label for="password">Password</label>
        </div>
        <div class="input-group float-right">
            <button class="button button-flat" disabled="disabled">Register</button>
            <button class="button button-primary">Log in</button>
            <div class="clearfix"></div>
        </div>
    </div>
    --}}

    <div class="input-group float-right">
        {{--<a href="{{ route('register') }}" class="button button-raised">Register</a>--}}
        <a href="{{ route('login') }}" class="button button-primary">Log in</a>
        <div class="clearfix"></div>
    </div>

@endsection
