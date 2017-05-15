@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Create new song')
@section('navbar-title', 'Create song')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Songs", link: "{{ route('songs.index', $band) }}"},
                        {name: "Create new song", link: "{{ route('songs.create', $band) }}"}
                        ]'>
                </breadcrumbs>
                <h1>Create new song</h1>
                <form action="{{ route('songs.store', $band) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-group col-sm-6">
                            <input type="text" name="title" id="title" placeholder="The song title"/>
                            <label for="title">Title</label>
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="text" name="artist" id="artist" placeholder="The original artist/band"/>
                            <label for="artist">Artist</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-6">
                            <input type="text" name="lyrics_by" id="lyrics-by" placeholder="The lyrics author"/>
                            <label for="lyrics-by">Lyrics by</label>
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="text" name="music_by" id="music-by" placeholder="The music composer"/>
                            <label for="music-by">Music by</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-12">
                            <p>You may set the following values different every time you add this song to a setlist,
                                but values entered here will be used as default</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-6">
                            @include('songs.key-select')
                            <label for="key">Key</label>
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="number" name="bpm" min="0" placeholder="Beats Per Minute"/>
                            <label for="bpm">BPM</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-6">
                            <input type="number" name="duration" min="0" placeholder="Minutes"/>
                            <label for="duration">Duration</label>
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="number" name="intensity" min="1" max="10" placeholder="1&ndash;10 (Ballad&ndash;Bebop)"/>
                            <label for="intensity">Intensity</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <button type="submit" class="button button-flat button-primary">Create</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
                @include('errors.validation-errors')
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('songs.index', $band) }}">Back to song list</a>
                </div>
            </div>
        </div>
    </div>
@endsection