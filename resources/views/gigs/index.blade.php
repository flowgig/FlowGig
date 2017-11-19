@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Gigs')
@section('navbar-title', 'Gigs')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "FlowGig", link: "/"},
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Gigs", link: "{{ route('gigs.index', $band) }}"}
                        ]'>
                </breadcrumbs>
                <div class="page-header">
                    <h1 class="page-title">Gigs</h1>
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.show', $band) }}', type: 'raised', content: 'Back to band'},
                                    {link: '{{ route('gigs.create', $band) }}', type: 'raised', theme: 'primary', content: 'New gig'},
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
                <div class="content-container raised">
                    <gigs v-bind:list-items="{{ $band->gigs }}"></gigs>
                </div>
                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.show', $band) }}', type: 'raised', content: 'Back to band'},
                                    {link: '{{ route('gigs.create', $band) }}', type: 'raised', theme: 'primary', content: 'New gig'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection