<script>
    import * as quark from 'quark-gui';
    import EditSetlistSongTemplate from './EditSetlistSongTemplate.quark';
    import SetlistSong from "../single/SetlistSong";

    export default {
        name: 'EditSetlistSong',
        props: ['method', 'values'],
        template: EditSetlistSongTemplate,
        components: {
            SetlistSong: SetlistSong
        },
        data() {
            return {
                data: {
                    values: this.values != undefined ? this.values : {}
                }
            }
        },
        mounted: function () {
            quark.LazyInit();
        },
        computed: {
            modalId: function () {
                return 'setlist-song-modal-' + this.values.number_in_list
            }
        }
    }
</script>
