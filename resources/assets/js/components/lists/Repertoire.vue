<script>
    import * as quark from 'quark-gui';
    import RepertoireSong from "../list-items/RepertoireSong";
    import RepertoireTemplate from './RepertoireTemplate.quark';

    export default {
        name: 'Repertoire',
        props: ['listItems'],
        template: RepertoireTemplate,
        components: {
            RepertoireSong: RepertoireSong
        }
    }
</script>
