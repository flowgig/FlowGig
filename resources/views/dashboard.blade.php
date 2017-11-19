@extends('layouts.master')
@section('title', 'Dashboard')
@section('navbar-title', 'Dashboard')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <div class="hidden">
                    <breadcrumbs
                            v-bind:breadcrumb-items='[
                            {name: "FlowGig", link: "/"}
                        ]'>
                    </breadcrumbs>
                </div>
                <h1>My FlowGig</h1>

                <div class="content-container raised">
                    <div class="content-container-header"><h2>Bands</h2></div>
                    @if($user->bands->count() > 0)
                        <bands v-bind:list-items="{{ $user->bands }}"></bands>
                    @else
                        <p>You're not a member of any bands yet</p>
                    @endif
                    <div class="content-container-footer list-footer-button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                        buttons: [
                                            {link: '{{ route('bands.index') }}', content: 'Manage bands'},
                                            {link: '{{ route('bands.create') }}', theme: 'primary', content: 'New band'},
                                        ]
                                    }">
                        </custom-button-row>
                    </div>
                </div>
                <div class="spacer-vertical-36"></div>
                <div class="content-container raised">
                    <div class="content-container-header"><h2>Upcoming gigs</h2></div>
                    @if($user->upcomingGigs()->count() > 0)
                        <gigs v-bind:list-items="{{ $user->upcomingGigs()->sortBy('date') }}"></gigs>
                    @else
                        <p>You have no upcoming gigs at the moment</p>
                    @endif
                    <div class="content-container-footer list-footer-button-row">
                    <!-- <custom-button-row // TODO add buttons for gigs
                                    v-bind:button-row="{
                                        buttons: [
                                            {link: '{{ route('bands.index') }}', content: 'Manage bands'},
                                            {link: '{{ route('bands.create') }}', theme: 'primary', content: 'New band'},
                                        ]
                                    }">
                            </custom-button-row>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection