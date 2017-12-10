<script>
    import * as quark from 'quark-gui';
    import SetlistSongTemplate from './SetlistSongTemplate.quark';
    import EditSetlistSong from "../modals/EditSetlistSong";

    export default {
        name: 'SetlistSong',
        props: ['method', 'values'],
        template: SetlistSongTemplate,
        components: {
            EditSetlistSong: EditSetlistSong
        },
        data() {
            return {
                data: {
                    values: this.values != undefined ? this.values : {}
                }
            }
        },
        methods: {
            removeSetlistSong: function(){
                console.log('remove setlist song');
            }
        }
    }
</script>
