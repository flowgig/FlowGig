@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Band members')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "FlowGig", link: "/"},
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
                                    {link: '{{ route('band-invitations.create', $band) }}', type: 'raised', theme: 'primary', content: 'New member'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
                <div class="content-container raised">
                    <band-members v-bind:band-members="{{ $band->memberships }}"
                                  v-bind:auth-user="{{ Auth::user() }}"></band-members>
                </div>

                @if($band->invitations()->count() > 0)
                    <div class="spacer-vertical-12"></div>
                    <div class="content-container raised">
                        <div class="content-container-header"><h2>Invitations</h2></div>
                        <invitations v-bind:list-items="{{ $band->invitations }}"></invitations>
                    </div>
                @endif
                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.show', $band) }}', type: 'raised', content: 'Back to band'},
                                    {link: '{{ route('band-invitations.create', $band) }}', type: 'raised', theme: 'primary', content: 'New member'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

