@extends('layouts.master', ['currentBand' => $song->band])
@section('title', 'Song - ' . $song->title)
@section('navbar-title', $song->title)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items="[
                        {name: 'Bands', link: '{{ route('bands.index') }}'},
                        {name: '{{ $song->band->name }}', link: '{{ route('bands.show', $song->band) }}'},
                        {name: 'Songs', link: '{{ route('songs.index', $song->band) }}'},
                        {name: '{{$song->title}}', link: '{{ route('songs.show', $song) }}'}
                        ]">
                </breadcrumbs>
                <h1>{{ $song->title }}</h1>
                <div class="text-right">
                    <a class="button button-icon button-flat button-default tooltip" title="Edit {{$song->title}}"
                       href="{{ route('songs.edit', $song) }}"><span class="fa fa-pencil"></span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list">
                            <li><b>Artist: </b> {{ $song->artist }}</li>
                            <li><b>Lyrics: </b> {{ $song->lyrics_by }}</li>
                            <li><b>Music: </b> {{ $song->music_by }}</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p><i>The following properties are defaults which may be set
                                different for each instance of this song in setlists</i>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list">
                            <li><b>Key: </b> {{ $song->key }}</li>
                            <li><b>BPM: </b> {{ $song->bpm }}</li>
                            <li><b>Duration: </b> {{ $song->duration }}</li>
                            <li><b>Intensity: </b> {{ $song->intensity }}</li>
                        </ul>
                    </div>
                </div>
                @include('meta.user-timestamps', ['model' => $song])
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('songs.index', $song->band) }}">Back to song list</a>
                </div>
            </div>
        </div>
    </div>
@endsection