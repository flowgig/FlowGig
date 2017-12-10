<script>
    import * as quark from 'quark-gui';
    import SongTemplate from './SongTemplate.quark';

    export default {
        name: 'Song',
        props: ['url', 'method', 'values', 'links'],
        template: SongTemplate,
        data() {
            return {
                data: {
                    values: this.values != undefined ? this.values : {}
                }
            }
        }
    }
</script>
