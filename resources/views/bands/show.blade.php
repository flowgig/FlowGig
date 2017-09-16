@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Setlist - ' . $band->name)
@section('navbar-title', $band->name)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"}
                        ]'>
                </breadcrumbs>
                <div class="page-header">
                    <h1 class="page-title">{{ $band->name }}</h1>
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.index') }}', type: 'raised', content: 'Manage bands'},
                                    {link: '{{ route('bands.edit', $band) }}', type: 'raised', theme: 'primary', content: 'Edit band'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
                <div class="content-container raised">
                    <div class="content-container-header"><h2>Upcoming gigs</h2></div>
                    <gigs v-bind:list-items="{{ $band->upcomingGigs()->sortBy('date') }}"></gigs>
                </div>
                <div class="spacer-vertical-12"></div>
                <div class="content-container raised">
                    <band-navigation
                            v-bind:band-id="{{ $band->id }}"
                            v-bind:counter="{
                                songs: '{{ count($band->songs) }}',
                                gigs: '{{ count($band->gigs) }}',
                                members: '{{ count($band->members) }}'
                            }">
                    </band-navigation>
                </div>
                @include('meta.user-timestamps', ['model' => $band])
                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                 buttons: [
                                    {link: '{{ route('bands.index') }}', type: 'raised', content: 'Manage bands'},
                                    {link: '{{ route('bands.edit', $band) }}', type: 'raised', theme: 'primary', content: 'Edit band'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection