@extends('layouts.noauth')

@section('title', 'Welcome')
@section('content')

            <div class="input-group float-right">
                <a class="button button-flat button-primary" href="/login">Log in</a>
                <div class="clearfix"></div>
            </div>
            <div class="content">
                <div class="input-group">
                    <input id="username" type="text"/><label for="username">Username</label>
                </div>
                <div class="input-group">
                    <input id="password" type="password"/><label for="password">Password</label>
                </div>
                <div class="input-group float-right">
                    <a href="{{ route('register') }}" class="button button-flat">Register</a>
                    <button class="button button-primary">Log in</button>
                    <div class="clearfix"></div>
                </div>
            </div>
@endsection