@extends('layouts.master')
@section('title', 'Dashboard')
@section('navbar-title', 'Dashboard')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items="[
                        {name: 'Dashboard', link: '/dashboard'}
                        ]">
                </breadcrumbs>
                <h1>My FlowGig</h1>

                <div id="dashboard" class="content">
                    <p>Name: {{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                    <br>
                    <h2>Upcoming gigs</h2>

                    <upcoming-gigs></upcoming-gigs>

                    <h2>Bands</h2>
                    <div class="block text-right">
                        <a class="button button-flat button-default" href="{{ route('bands.index') }}">Manage bands</a>
                    </div>
                    <band-cards></band-cards>


                @foreach($user->bands as $band)
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection