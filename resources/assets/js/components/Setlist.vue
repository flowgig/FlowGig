<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'Setlist',
        props: ['setlist', 'repertoire'],
        data () {
            return {
                htmlContent: "",
                csrfToken: "",
                setlistSongs: [],
                newSong: {}
            }
        },
        ready: function () {
            /*this.setlistSongs = this.setlist.setlist_songs.sort(function (a, b) {
             return a.number_in_list - b.number_in_list;
             });*/
        },
        created: function () {
            this.htmlContent = this.createListElement();
        },
        components: {
            /*'song': {
             //  template: '#song',
             props: ['song'],
             methods: {
             addToSetlist: function () {

             var setlistSong = {
             setlist_id: this.$parent.setlist.id,
             song: this.song,
             number_in_list: this.$parent.setlistSongs.length + 1,
             };

             var createOnServerAndPushToList = function (createdSetlistSong) {
             createdSetlistSong.song = this.song;
             this.$parent.setlistSongs.push(createdSetlistSong);
             }.bind(this);

             this.$parent.saveNewSetlistSong(setlistSong, createOnServerAndPushToList);
             },
             },
             computed: {
             isAdded: function () {
             var isAdded = false;
             this.$parent.setlistSongs.forEach(function (setlistSong) {
             if (setlistSong.song_id === this.song.id)
             isAdded = true;
             }.bind(this));
             return isAdded;
             }
             }
             },*/
            /*'setlistsong': {
             //template: '#setlistsong',
             props: ['setlistSong'],
             data: function () {
             return {
             edit: false,
             keyOptions: musicalKeys
             }
             },
             methods: {
             save: function () {
             this.$parent.saveUpdatedSetlistSong(this.setlistSong);
             },
             remove: function () {
             if (!confirm('This removes "' + this.setlistSong.song.title + '" from the setlist'))
             return;

             var payLoad = {
             body: {
             _token: this.$parent.csrfToken
             }
             };
             this.$http.delete('/setlistsongs/' + this.setlistSong.id, payLoad);

             this.$parent.setlistSongs.$remove(this.setlistSong);
             }
             },
             components: {
             'v-select': window.VueSelect.VueSelect
             }
             }*/
        },
        /*  methods: {
         reOrderSetlistSongs: function (reorderedList) {
         reorderedList.forEach(function (reorderedSetlistSong) {
         var setlistSong = this.setlistSongs[this.setlistSongs.indexOf(reorderedSetlistSong)];
         setlistSong.number_in_list = reorderedList.indexOf(reorderedSetlistSong) + 1;
         this.saveUpdatedSetlistSong(setlistSong);
         }.bind(this));
         },
         saveNewSetlistSong: function (setlistSong, afterStore) {
         var url = '/setlists/' + setlistSong.setlist_id + '/setlistsongs/';
         var payLoad = {
         _token: this.csrfToken,
         song_id: setlistSong.song.id,
         number_in_list: setlistSong.number_in_list
         };
         this.$http.post(url, payLoad).then(function (createdSetlistSong) {
         afterStore(createdSetlistSong.json())
         });
         },
         saveUpdatedSetlistSong: function (setlistSong) {
         var payLoad = {
         _token: this.csrfToken,
         setlist_id: setlistSong.setlist_id,
         song_id: setlistSong.song.id,
         number_in_list: setlistSong.number_in_list,
         key: setlistSong.key,
         bpm: setlistSong.bpm ? setlistSong.bpm : null,
         intensity: setlistSong.intensity ? setlistSong.intensity : null,
         duration: setlistSong.duration ? setlistSong.duration : null,
         comment: setlistSong.comment
         };
         this.$http.put('/setlistsongs/' + setlistSong.id, payLoad);
         }
         },*/
        events: {
            'reordered': function (reorderedList) {
                this.reOrderSetlistSongs(reorderedList);
            }
        },
        methods: {
            createListElement: function () {
                return quark.Organisms.Menus.ListMenu.getModule({
                    id: 'songs-list',
                    hover: true,
                    dragable: true,
                    raised: true,
                    listItems: this.createListItems()
                });
            },
            createListItems: function () {
                var listItems = [];
                this.setlist.setlist_songs.forEach(function (setlistSong) {
                    var listItem = {
                        id: 'setlist-' + this.setlist.id + '-song-' + setlistSong.song.id,
                        title: setlistSong.song.title,
                        expandable: true,
                        buttonRow: {
                            buttons: [
                                {
                                    iconClass: 'fa fa-minus'
                                }
                            ]
                        },
                        expandableContent: "test"
                    }
                    listItems.push(listItem);
                }.bind(this));
                return listItems;
            }
        }
    }
</script>