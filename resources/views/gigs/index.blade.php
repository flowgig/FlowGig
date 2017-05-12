@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Gigs')
@section('navbar-title', 'Gigs')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items="[
                        {name: 'Bands', link: '{{ route('bands.index') }}'},
                        {name: '{{ $band->name }}', link: '{{ route('bands.show', $band) }}'},
                        {name: 'Gigs', link: '{{ route('gigs.index', $band) }}'}
                        ]">
                </breadcrumbs>
                <h1>Gigs</h1>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.show', $band) }}">Back to
                        band</a>
                    <a class="button button-flat button-primary" href="{{ route('gigs.create', $band) }}">New gig</a>
                </div>
                <gigs v-bind:gigs="{{ $band->gigs }}"></gigs>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.show', $band) }}">Back to
                        band</a>
                    <a class="button button-flat button-primary" href="{{ route('gigs.create', $band) }}">New gig</a>
                </div>
            </div>
        </div>
    </div>
@endsection