<script>
    import * as quark from 'quark-gui';
    import Gig from "../list-items/Gig";
    import GigsTemplate from './GigsTemplate.quark';

    export default {
        name: 'Gigs',
        props: ['listItems'],
        template: GigsTemplate,
        components: {
            Gig: Gig
        }
    }
</script>
