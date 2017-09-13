<script>
    import * as quark from 'quark-gui';
    import Song from "../list-items/Song";
    import SongsTemplate from './SongsTemplate.quark';

    export default {
        name: 'Songs',
        props: ['listItems'],
        template: SongsTemplate,
        components: {
            Song: Song
        }
    }
</script>
