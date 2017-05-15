@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Songs')
@section('navbar-title', 'Songs')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Songs", link: "{{ route('songs.index', $band) }}"}
                        ]'>
                </breadcrumbs>
                <h1>Songs</h1>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.show', $band) }}">Back to
                        band</a>
                    <a class="button button-flat button-primary" href="{{ route('songs.create', $band) }}">New song</a>
                </div>
                <songs v-bind:songs="{{  $band->songs }}"></songs>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.show', $band) }}">Back to
                        band</a>
                    <a class="button button-flat button-primary" href="{{ route('songs.create', $band) }}">New song</a>
                </div>
            </div>
        </div>
    </div>
@endsection