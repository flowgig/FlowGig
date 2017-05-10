@extends('layouts.noauth')
@section('title', 'Welcome')
@section('content')

    <div class="input-group float-right">
        <a href="{{ route('register') }}" class="button button-raised">Register</a>
        <a href="{{ route('login') }}" class="button button-primary">Log in</a>
        <div class="clearfix"></div>
    </div>

@endsection
