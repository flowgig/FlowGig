@extends('layouts.master')
@section('title', 'Dashboard')
@section('navbar-title', 'Dashboard')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Dashboard", link: "/dashboard"}
                        ]'>
                </breadcrumbs>
                <h1>My FlowGig</h1>

                <div id="dashboard" class="content">
                    <p>Name: {{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                    <br>

                    <div class="content-container raised">
                        <div class="content-container-header"><h2>Upcoming gigs</h2></div>
                        <gigs v-bind:list-items="{{ $user->upcomingGigs()->sortBy('date') }}"></gigs>
                    </div>
                    <h2>Bands</h2>
                    <div class="block text-right">
                        <custom-button
                                v-bind:button="{link: '{{ route('bands.index') }}', content: 'Manage bands'}">
                        </custom-button>
                    </div>
                    <band-cards v-bind:bands="{{ $user->bands }}"></band-cards>
                </div>
            </div>
        </div>
    </div>
@endsection