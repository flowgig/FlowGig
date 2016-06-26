@extends('layouts.master')
@section('title', 'Setlist - ' . $setlist->title)
@section('navbar-title', $setlist->title)
@section('content')

    <div class="action-button">
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
        <div class="modal-header">
            Repertoire:
        </div>
        <div class="modal-content">
            <ul class="list list-clickable">
                <li v-for="song in repertoire">
                    <song v-bind:song="song"></song>
                </li>
            </ul>
        </div>
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
            <div id="setlist">
                <div class="content">
                    <div class="box z-1">
                        <div class="content">
                            <div class="breadcrumbs">
                                <a href="/">FlowGig</a> &gt;
                                <a href="{{ route('setlist.index') }}">Setlists</a> &gt;
                                {{$setlist->title}}
                            </div>
                            <h1>{{ $setlist->title }}</h1>
                            <p>edit the setlist <i>{{ $setlist->title }}</i> ...</p>
                            <h3>Songs:</h3>
                            <div>
                                <ul id="setlistsongs" class="list sortable-list" v-sortable="vueSortableOptions">
                                    <li v-for="setlistSong in setlistSongs">
                                        <setlistsong v-bind:setlist-song="setlistSong"></setlistsong>
                                    </li>
                                </ul>
                            </div>
                            <div class="block text-right">
                                <a class="button button-flat button-primary" href="{{ route('setlist.index') }}">Back to list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="content">
                <div class="box">
                    <div class="content">
                        <h2>Test create new SetlistSong</h2>
                        <form action="{{  route('setlistsong.store', [$setlist, 5]) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="number" id="number_in_list" name="number_in_list"/><label for="number_in_list">Number in list</label>
                            </div>
                            <div class="input-group">
                                <input type="number" id="setnumber" name="setnumber" placeholder="1/2/3"/><label for="setnumber">Setnumber</label>
                            </div>
                            <div class="input-group">
                                <input type="text" id="key" name="key" placeholder="A/Gm/F"/><label for="key">Key</label>
                            </div>
                            <div class="input-group">
                                <input type="number" id="energy" name="energy" placeholder="0-100"/><label for="energy">Energy</label>
                            </div>
                            <div class="input-group">
                                <input type="number" id="duration" name="duration" placeholder="180"/><label for="duration">Duration</label>
                            </div>
                            <div class="input-group">
                                <input type="text" id="comment" name="comment"/><label for="comment">Comment</label>
                            </div>
                            <input type="submit" class="button button-flat" value="Create"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <template id="song">
        <div v-on:click="addToSetlist()" class="tooltip" title="Add @{{ song.title }} to setlist">
            <i>@{{ song.id }}: </i> @{{ song.title }}
            <small>(@{{ song.music_by }}/@{{ song.lyrics_by }})</small>
        </div>
    </template>

    <template id="setlistsong">
        <span class="sortable-handle fa fa-sort"></span>
        <span class="list-item-divider"></span>
        <span class="list-item-content">
            @{{ setlistSong.number_in_list }} &#151; @{{ setlistSong.song.title }}
            <small>(@{{ setlistSong.song.music_by }}/@{{ setlistSong.song.lyrics_by }})</small>
        </span>
        <span class="list-item-buttons">
            <a class="button button-icon tooltip" title="Edit @{{setlistSong.song.title}}">
                <span class="fa fa-pencil"></span>
            </a>
             <a class="button button-icon tooltip" title="Remove @{{setlistSong.song.title}}">
                 <span class="fa fa-trash"></span>
             </a>
        </span>
    </template>

    <script>

        var vueSortableOptions = {
            animation: 150,
            handle: '.sortable-handle',
            onSort: function (evt) {
                vm.reOrderSetlistSongs(evt.oldIndex, evt.newIndex);
            }
        };

        var vm = new Vue({
            el: 'body',
            data: {
                setlist: {!! $setlist !!},
                repertoire: {!! $repertoire !!},
                newSong: {},
                vueSortableOptions: vueSortableOptions
            },
            computed: {
                setlistSongs: function () {
                    return this.setlist.setlist_songs
                }
            },
            components: {
                'song': {
                    template: '#song',
                    props: ['song'],
                    methods: {
                        addToSetlist: function () {

                            var setlistSong = {
                                setlist: this.$parent.setlist,
                                song: this.song,
                                number_in_list: this.$parent.setlistSongs.length + 1
                            };

                            this.$parent.setlistSongs.push(setlistSong);

                            // TODO: Store setlistSong
                        }
                    }
                },
                'setlistsong': {
                    template: '#setlistsong',
                    props: ['setlistSong'],
                    methods: {
                        save: function () {
                            alert('Save ' + this.setlistSong.title);
                        }
                    }
                }
            },
            methods: {
                updateNumber: function (setlistSong) {
                    $("#setlistsongs li").each(function (i, elm) {
                        $elm = $(elm); // cache the jquery object
                        $elm.attr("data-number-in-list", $elm.index("#setlistsongs li") + 1);
                    });
                },
                reOrderSetlistSongs: function (oldIndex, newIndex) {
                    console.log('"' + this.setlistSongs[oldIndex].song.title + '" was #' + (oldIndex + 1) + ', became #' + (newIndex + 1));
                    // TODO: Update position-attribute on (and store) implicated setlistSongs
                }
            }
        });
        $(".list-clickable li").click(function () {
            $(this).addClass("list-item-clicked").delay(1000).queue(function () {
                $(this).removeClass("list-item-clicked").dequeue();
            });
        });
    </script>

@endsection