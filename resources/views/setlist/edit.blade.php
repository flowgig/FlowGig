@extends('layouts.master')
@section('title', 'Setlist - ' . $setlist->title)
@section('navbar-title', $setlist->title)
@section('content')

    <div class="action-button" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <i class="icon fa fa-plus"></i>
    </div>
    <div class="action-menu" id="action-menu">
        <button class="toggle-action-button toggle-elements tooltip" data-type="radio" title="Add song from repertoire" value="repertoire-modal">
            <span class="icon fa fa-list">
            </span>
        </button>
        <button class="toggle-action-button toggle-elements tooltip" data-type="radio" title="Add new song" value="add-song-modal">
                <span class="icon fa fa-plus">
                </span>
        </button>
        <button class="toggle-action-button toggle-elements tooltip" data-type="radio" title="Export setlist" value="export-setlist-modal">
                <span class="icon fa fa-download">
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
            <a class="button button-flat button-primary tooltip" v-on:click="addSong(newSong)" title="Add @{{ newSong.title }} to setlist">Add song</a>
        </div>
    </div>
    <div id="repertoire" class="actionbar-modal export-setlist-modal">
        <div class="modal-header">Export setlist:</div>
        <div class="modal-content">
            <div class="input-group">
                <a href="{{ route('setlist.export-preview', $setlist) }}" target="_blank" class="button button-flat tooltip" title="Preview {{ $setlist->title }}">
                    <label for="preview">Preview</label>
                </a>
                <a href="{{ route('setlist.export', $setlist) }}" target="_blank" class="button button-flat tooltip" title="Export {{ $setlist->title }} to PDF">
                    <label for="export">Export to PDF</label>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <div id="setlist" xmlns:v-on="http://www.w3.org/1999/xhtml">
                <div class="content">
                    <div class="box z-1">
                        <div class="content">
                            <h1>{{ $setlist->title }}</h1>
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
        <div class="container" style="background: white">
            <h2>Test create new SetlistSong</h2>
            <form action="{{  route('setlistsong.store', [$setlist, 5]) }}" method="POST">
                {{ csrf_field() }}
                <input type="number" name="number_in_list" /><label for="number_in_list">Number in list</label><br />
                <input type="number" name="setnumber" placeholder="1/2/3" /><label for="setnumber">Setnumber</label><br />
                <input type="text" name="key" placeholder="A/Gm/F" /><label for="key">Key</label><br />
                <input type="number" name="energy" placeholder="0-100" /><label for="energy">Energy</label><br />
                <input type="number" name="duration" placeholder="180" /><label for="duration">Duration</label><br />
                <input type="text" name="comment" /><label for="comment">Comment</label><br />
                <input type="submit" value="Create" />
            </form>
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
        $(".list-clickable li").click(function(){
            $(this).addClass("list-item-clicked").delay(1000).queue(function(){
                $(this).removeClass("list-item-clicked").dequeue();
            });
        });

    </script>

@endsection