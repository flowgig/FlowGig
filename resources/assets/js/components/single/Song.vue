<script>
    import * as quark from 'quark-gui';
    import SongTemplate from './SongTemplate.quark';

    export default {
        name: 'Song',
        props: ['formData'],
        template: SongTemplate,
        data() {
            return {
                form: {
                    data: this.formData,
                    readOnly: this.formData.viewType == 'show'
                },
                csrfToken: window.Laravel.csrfToken
            }
        }
    }
</script>
