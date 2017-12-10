<script>
    import * as quark from 'quark-gui';
    import SetlistTemplate from './SetlistTemplate.quark';
    import SetlistSong from "../list-items/SetlistSong";

    let dragula = require('dragula');

    export default {
        name: 'Setlist',
        props: ['repertoire', 'method', 'values'],
        template: SetlistTemplate,
        data() {
            return {
                data: {
                    values: this.values != undefined ? this.values : {}
                },
                setlistSongs: this.values.setlist_songs,
                dragula: null
            }
        },
        mounted: function () {
            this.dragula = dragula([document.querySelector('#setlist-songs-list')]);
            let from = null
            this.dragula.on('drag', function (element, source) {
                var index = [].indexOf.call(element.parentNode.children, element);
                console.log('drag from', index, element, source);
                from = index;
            }.bind(this))
            this.dragula.on('drop', function (element, target, source, sibling) {
                var index = [].indexOf.call(element.parentNode.children, element)
                console.log('drop to', index, element, target, source, sibling);
                this.setlistSongs.splice(index, 0, this.setlistSongs.splice(from, 1)[0]);
                this.updateNumberInListForAllSetlistSongs();
                setTimeout(function () {
                    quark.LazyInit();
                }, 100);
            }.bind(this))
        },
        components: {
            SetlistSong: SetlistSong
        },
        events: {
            'reordered': function (reorderedList) {
                this.reOrderSetlistSongs(reorderedList);
            }
        },
        methods: {
            addToSetlist: function (repertoireSong) {
                console.log('add to setlist');
                console.log(repertoireSong);
                let setlistSong = {
                    song_id: repertoireSong.id,
                    setlist_id: this.data.values.id,
                    number_in_list: this.setlistSongs.length + 1,
                    key: repertoireSong.key,
                    bpm: repertoireSong.bpm ? repertoireSong.bpm : null,
                    intensity: repertoireSong.intensity ? repertoireSong.intensity : null,
                    duration: repertoireSong.duration ? repertoireSong.duration : null,
                    comment: '',
                    song: repertoireSong
                }
                this.setlistSongs.push(setlistSong);
            },
            isAdded: function (repertoireSong) {
                let isAdded = false;
                this.setlistSongs.forEach(function (setlistSong) {
                    if (repertoireSong.id == setlistSong.song.id) {
                        isAdded = true;
                        return;
                    }
                });
                return isAdded;
            },
            updateNumberInListForAllSetlistSongs: function () {
                this.setlistSongs.forEach(function (setlistSong, index) {
                    setlistSong.number_in_list = index + 1;
                });

            }
        }
    }
</script>
