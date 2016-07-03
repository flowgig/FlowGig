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
        <div class="modal-content">
            <div class="modal-header">
                Repertoire:
            </div>
            <ul class="list">
                <li v-for="song in repertoire">
                    <song v-bind:song="song"></song>
                </li>
            </ul>
        </div>
    </div>
    <div id="repertoire" class="actionbar-modal add-song-modal">
        <div class="modal-content">
            <div class="modal-header">Add new song:</div>
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
        <div class="modal-content">
            <div class="modal-header">Export setlist:</div>
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
                    <div class="box">
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
                                <ul v-sortable.li="setlistSongs" class="list sortable-list">
                                    <li v-for="setlistSong in setlistSongs" class="setlistsong">
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
        <span>
            <span class="list-item-content">
                @{{ song.title }}
                <small>(@{{ song.music_by }}/@{{ song.lyrics_by }})</small>
            </span>
            <span class="list-item-button">
                <span v-on:click="addToSetlist()" class="button button-icon button-flat button-success modal-hover-add-button tooltip" title="Add @{{ song.title }} to setlist"></span>
            </span>
        </span>
    </template>

    <template id="setlistsong">
        <span class="sortable-handle fa fa-sort"></span>
        <span class="list-item-divider"></span>
        <span class="list-item-content">
            @{{ setlistSong.number_in_list }} &#151; @{{ setlistSong.song.title }}
            <small>(@{{ setlistSong.song.music_by }}/@{{ setlistSong.song.lyrics_by }})</small>
        </span>
        <span class="list-item-buttons">
            <a class="button button-icon button-flat tooltip" title="Edit @{{setlistSong.song.title}}">
                <span class="fa fa-pencil"></span>
            </a>
             <a class="button button-icon button-flat tooltip" title="Remove @{{setlistSong.song.title}}">
                 <span class="fa fa-trash"></span>
             </a>
        </span>
    </template>

    <script>

        Vue.directive('sortable', {
            twoWay: true,
            deep: true,
            bind: function () {
                var that = this;

                var options = {
                    draggable: Object.keys(this.modifiers)[0],
                    animation: 150,
                    handle: '.sortable-handle'
                };

                this.sortable = Sortable.create(this.el, options);
                console.log('sortable bound!')

                this.sortable.option("onUpdate", function (e) {
                    that.value.splice(e.newIndex, 0, that.value.splice(e.oldIndex, 1)[0]);
                    vm.$emit('reordered', that.value);
                });

                this.onUpdate = function (value) {
                    that.value = value;
                }
            },
            update: function (value) {
                this.onUpdate(value);
            }
        });

        var vm = new Vue({
            el: 'body',
            data: {
                setlist: {!! $setlist !!},
                repertoire: {!! $repertoire !!},
                newSong: {}
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

                            var pushToList = function () {
                                return this.$parent.setlistSongs.push(setlistSong);
                            }.bind(this);

                            this.$parent.saveSetlistSong(setlistSong, pushToList);
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
                reOrderSetlistSongs: function (reorderedList) {
                    reorderedList.forEach(function (reorderedSetlistSong) {
                        var setlistSong = this.setlistSongs[this.setlistSongs.indexOf(reorderedSetlistSong)];
                        setlistSong.number_in_list = reorderedList.indexOf(reorderedSetlistSong) + 1;
                        // TODO: Store setlistSong
                    }.bind(this));
                },
                saveSetlistSong: function (setlistSong, pushToList) {
                    var url = '/setlistsong/' + setlistSong.setlist.id + '/' + setlistSong.song.id;
                    var payLoad = {_token: '{{ csrf_token() }}', number_in_list: setlistSong.number_in_list};
                    this.$http.post(url, payLoad).then(pushToList());
                }
            },
            events: {
                'reordered': function (reorderedList) {
                    this.reOrderSetlistSongs(reorderedList);
                }
            }
        });

    </script>

@endsection