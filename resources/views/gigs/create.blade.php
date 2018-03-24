@extends('layouts.master', ['currentBand' => $band])
@section('title', 'New gig')
@section('content')
    <div class="content">
        <breadcrumbs
                v-bind:breadcrumb-items='[
                        {name: "FlowGig", link: "/"},
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Gigs", link: "{{ route('gigs.index', $band) }}"},
                        {name: "Create new gig", link: "{{ route('gigs.create', $band) }}"}
                        ]'>
        </breadcrumbs>
        <h1>Create new gig</h1>
        <div class="content-container raised">
            <gig url="{{ route('gigs.store', $band) }}"
                 method="POST">
            </gig>
        </div>
        @include('errors.validation-errors')
        <div class="page-footer">
            <div class="button-row">
                <custom-button-row
                        v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('gigs.index', $band) }}', type: 'raised', content: 'Back to gig list'}                                ]
                            }">
                </custom-button-row>
            </div>
        </div>
    </div>
@endsection