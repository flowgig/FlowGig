<script>
    import * as quark from 'quark-gui';
    import SetlistSongTemplate from './SetlistSongTemplate.quark';
    import EditSetlistSong from "../modals/EditSetlistSong";

    export default {
        name: 'SetlistSong',
        props: ['formData', 'setlistSongId'],
        template: SetlistSongTemplate,
        components: {
            EditSetlistSong: EditSetlistSong
        },
        data() {
            return {
                form: {
                    data: this.formData.viewType == 'create' ? {} : this.formData.savedValues,
                    readOnly: this.formData.viewType == 'show'
                },
                csrfToken: window.Laravel.csrfToken
            }
        }
    }
</script>
