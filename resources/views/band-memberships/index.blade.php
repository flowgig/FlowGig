@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Band members')
@section('navbar-title', 'Band members')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Band members", link: "{{ route('band-memberships.index', $band) }}"}
                        ]'>
                </breadcrumbs>
                <div class="page-header">
                    <h1 class="page-title">Members</h1>
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.show', $band) }}', type: 'raised', content: 'Back to band'},
                                    {link: '{{ route('band-memberships.create', $band) }}', type: 'raised', theme: 'primary', content: 'New member'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
                <band-members v-bind:band-members="{{ $band->memberships }}" v-bind:auth-user="{{ Auth::user() }}"></band-members>
                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.show', $band) }}', type: 'raised', content: 'Back to band'},
                                    {link: '{{ route('band-memberships.create', $band) }}', type: 'raised', theme: 'primary', content: 'New member'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection