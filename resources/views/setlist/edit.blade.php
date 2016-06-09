@extends('layouts.master')
@section('title', 'Setlist - ' . $setlist->title)
@section('content')
    <div id="setlist">
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
        <div id="repertoire" class="actionbar-modal">
            @include('setlist._repertoire', $repertoire)
        </div>
        <div class="action-button">
            <i class="icon fa fa-plus"></i>
        </div>
        <div class="action-menu">
            <button class="toggle-action-button toggle-elements tooltip" id="" title="Add song from repertoire" value="actionbar-modal">
            <span class="icon fa fa-list">
            </span>
            </button>
            <!--<button class="toggle-action-button toggle-elements tooltip" id="" title="Add new song" value="">
                <span class="icon fa fa-plus">
                </span>
            </button> -->
        </div>
    </div>
    <script>
        new Vue({
            el: '#setlist',
            data: {
                setlistSongs: {!!  $setlist->setlistSongs !!},
                repertoire: {!!  $repertoire !!}
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