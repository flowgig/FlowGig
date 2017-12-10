<script>
    import * as quark from 'quark-gui';
    import AddSetlistSongTemplate from './AddSetlistSongTemplate.quark';

    export default {
        name: 'AddSetlistSong',
        props: ['songs', 'formData'],
        template: AddSetlistSongTemplate,
        data() {
            return {
                form: {
                    readOnly: this.formData.viewType == 'show'
                },
                setlistSongs: [],
                csrfToken: window.Laravel.csrfToken,
                selectedTemplate: ''
            }
        },
        watch: {
            selectedTemplate: function () {
                if (this.selectedTemplate) {
                    this.selectedOption = this.selectedTemplate;
                }
            }
        },
        computed: {
            repertoire: function () {
                let repertoire = [];
                this.songs.repertoire.forEach(function (repertoireSong) {
                    repertoireSong.isAdded = this.$parent.isAdded(repertoireSong)
                    repertoire.push(repertoireSong);
                }.bind(this));
                return repertoire;
            }
        },
        methods: {

        }
    }
</script>
