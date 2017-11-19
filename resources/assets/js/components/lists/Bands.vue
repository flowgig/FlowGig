<script>
    import * as quark from 'quark-gui';
    import Band from "../list-items/Band";
    import BandsTemplate from './BandsTemplate.quark';

    export default {
        name: 'Bands',
        props: ['listItems'],
        template: BandsTemplate,
        components: {
            Band: Band
        }
    }
</script>
