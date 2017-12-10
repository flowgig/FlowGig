<script>
    import * as quark from 'quark-gui';
    import EditSetlistSongTemplate from './EditSetlistSongTemplate.quark';
    import SetlistSong from "../single/SetlistSong";

    let Button = quark.Atoms.Buttons.Button;
    let Modal = quark.Molecules.Messaging.Modal;

    export default {
        name: 'EditSetlistSong',
        props: ['formData', 'newValues'],
        template: EditSetlistSongTemplate,
        components: {
            SetlistSong: SetlistSong
        },
        data() {
            return {
                form: {
                    readOnly: this.formData.viewType == 'show'
                },
                htmlContent: '',
                csrfToken: window.Laravel.csrfToken,
            }
        },
        mounted: function () {
            quark.LazyInit();
        },
      /*  watch: {
            modalId: function () {
              //  quark.LazyInit();
                console.log("new values lazy");
            }
        },*/
        computed: {
            modalId: function () {
                return 'setlist-song-modal-' + this.newValues.number_in_list
            }
        }
    }
</script>
