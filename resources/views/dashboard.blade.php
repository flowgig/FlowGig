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

                    <div class="section-header">
                        <h2 class="section-title">Upcoming gigs</h2>
                        <div class="button-row">
                        {{-- TODO: Add all gigs view (maybe) --}}
                           {{-- <custom-button-row
                                    v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.index') }}', content: 'Show all gigs bands'},
                                ]
                            }">
                            </custom-button-row> --}}
                        </div>
                    </div>
                    <div class="content-container raised">
                        <gigs v-bind:list-items="{{ $user->upcomingGigs()->sortBy('date') }}"></gigs>
                    </div>
                    <div class="spacer-vertical-36"></div>
                    <div class="section-header">
                        <h2 class="section-title">Bands</h2>
                        <div class="button-row">
                            <custom-button-row
                                    v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.index') }}', content: 'Manage bands'},
                                ]
                            }">
                            </custom-button-row>
                        </div>
                    </div>
                    <div class="grid">
                        @foreach($user->bands as $band)
                            <band-card
                                    v-bind:band="{{ $band }}"
                                    v-bind:counter="{
                                    songs: '{{ count($band->songs) }}',
                                    gigs: '{{ count($band->gigs) }}',
                                    members: '{{ count($band->members) }}'
                                    }">
                            </band-card>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection