<script>
    import * as quark from 'quark-gui';
    import GigTemplate from './GigTemplate.quark';

    export default {
        name: 'Gig',
        props: ['url', 'method', 'values', 'links'],
        template: GigTemplate,
        data() {
            return {
                data: {
                    values: this.values != undefined ? this.values : {}
                }
            }
        }
    }
</script>
