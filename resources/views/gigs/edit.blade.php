@extends('layouts.master', ['currentBand' => $gig->band])
@section('title', $gig->name . ' - Edit')
@section('navbar-title', $gig->name)
@section('content')
    <div class="content">
        <breadcrumbs
                v-bind:breadcrumb-items='[
                        {name: "FlowGig", link: "/"},
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $gig->band->name }}", link: "{{ route('bands.show', $gig->band) }}"},
                        {name: "Gigs", link: "{{ route('gigs.index', $gig->band) }}"},
                        {name: "{{ $gig->name }}", link: "{{ route('gigs.show', $gig) }}"},
                        {name: "Edit gig", link: "{{ route('gigs.edit', $gig) }}"}
                        ]'>
        </breadcrumbs>
        <h1>{{ $gig->name }}</h1>
        <div class="content-container raised">
            <gig url="{{ route('gigs.update', $gig) }}"
                 method="PUT"
                 v-bind:values="{{ $gig }}">
            </gig>
        </div>
        @include('errors.validation-errors')
        @include('meta.user-timestamps', ['model' => $gig])
        <div class="page-footer">
            <div class="button-row">
                <custom-button-row
                        v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('gigs.index', $gig->band) }}', type: 'raised', content: 'Back to gig list'}                                ]
                            }">
                </custom-button-row>
            </div>
        </div>
    </div>
@endsection