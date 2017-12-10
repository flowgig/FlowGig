<script>
    import * as quark from 'quark-gui';
    import AddSetlistSongTemplate from './AddSetlistSongTemplate.quark';

    export default {
        name: 'AddSetlistSong',
        props: ['method', 'values'],
        template: AddSetlistSongTemplate,
        data() {
            return {

                setlistSongs: [],
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
                this.values.forEach(function (repertoireSong) {
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
