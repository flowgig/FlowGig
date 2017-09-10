<script>
    import * as quark from 'quark-gui';
    import SetlistSongTemplate from './SetlistSongTemplate.quark';

    export default {
        name: 'SetlistSong',
        props: ['formData', 'setlistSongId'],
        template: SetlistSongTemplate,
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
