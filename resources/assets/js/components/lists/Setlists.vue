<script>
    import * as quark from 'quark-gui';
    import Setlist from "../list-items/Setlist";
    import SetlistsTemplate from './SetlistsTemplate.quark';

    export default {
        name: 'Setlists',
        props: ['listItems', 'gig'],
        template: SetlistsTemplate,
        components: {
            Setlist: Setlist
        }
    }
</script>
