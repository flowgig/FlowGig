@extends('layouts.master', ['currentBand' => $gig->band])
@section('title', $gig->name . ' - Edit')
@section('navbar-title', $gig->name)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $gig->band->name }}", link: "{{ route('bands.show', $gig->band) }}"},
                        {name: "Gigs", link: "{{ route('gigs.index', $gig->band) }}"},
                        {name: "{{ $gig->name }}", link: "{{ route('gigs.show', $gig) }}"},
                        {name: "Edit gig", link: "{{ route('gigs.edit', $gig) }}"}
                        ]'>
                </breadcrumbs>
                <h1>{{ $gig->name }}</h1>
                <edit-gig
                        v-bind:form-data="{
                        postUrl: '{{ route('gigs.update', $gig) }}',
                        newInstance: false,
                        savedValues: {{ $gig }}
                                }">
                </edit-gig>
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
        </div>
    </div>
@endsection