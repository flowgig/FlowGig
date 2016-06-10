@extends('layouts.master')
@section('title', 'Setlist - ' . $setlist->title)
@section('content')

    <div class="action-button">
        <i class="icon fa fa-plus"></i>
    </div>
    <div class="action-menu">
        <button class="toggle-action-button toggle-elements tooltip" data-type="radio" title="Add song from repertoire" value="repertoire-modal">
            <span class="icon fa fa-list">
            </span>
        </button>
        <button class="toggle-action-button toggle-elements tooltip" data-type="radio" title="Add new song" value="add-song-modal">
                <span class="icon fa fa-plus">
                </span>
        </button>
    </div>
    <div id="repertoire" class="actionbar-modal repertoire-modal">
        @include('setlist._repertoire', $repertoire)
    </div>
    <div id="repertoire" class="actionbar-modal add-song-modal">
        <div class="modal-header">Add new song:</div>
        <div class="modal-content">
            <div class="input-group">
                <input id="title" v-model="newSong.title" type="text"/><label for="title">Title</label>
            </div>
            <div class="input-group">
                <input id="lyrics_by" v-model="newSong.lyrics_by" type="text"/><label for="lyrics_by">Lyrics by</label>
            </div>
            <div class="input-group">
                <input id="music_by" v-model="newSong.music_by" type="text"/><label for="music_by">Music by</label>
            </div>
            <button class="button button-flat button-primary" v-on:click="addSong(newSong)">Add song</button>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <div id="setlist" xmlns:v-on="http://www.w3.org/1999/xhtml">
                <div class="content">

                    <div class="box z-1">
                        <div class="content">
                            <p>edit the setlist <i>{{ $setlist->title }}</i> ...</p>
                            @include('setlist._setlistsongs', ['setlistSongs' => $setlist->setlistSongs])
                            <div class="block text-right">
                                <a class="button button-flat button-primary" href="{{ route('setlist.index') }}">Back to list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        new Vue({
            el: 'body',
            data: {
                setlistSongs: {!!  $setlist->setlistSongs !!},
                repertoire: {!!  $repertoire !!},
                newSong: {}
            },
            methods: {
                addSong: function (song) {
                    var setlistSongs = this.setlistSongs;
                    var setlistSong = {};
                    setlistSong.song = song;
                    setlistSongs.push(setlistSong);
                    this.setlistSongs = setlistSongs;
                }
            }
        });
    </script>

@endsection