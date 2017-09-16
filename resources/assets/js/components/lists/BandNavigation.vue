<script>
    import * as quark from 'quark-gui';
    import BandNavigationTemplate from './BandNavigationTemplate.quark';

    export default {
        name: 'BandNavigation',
        props: ['bandId', 'counter'],
        template: BandNavigationTemplate,
        computed: {
            links: function () {
                return {
                    songs: '/bands/' + this.bandId + '/songs',
                    gigs: '/bands/' + this.bandId + '/gigs',
                    members: '/bands/' + this.bandId + '/band-memberships'
                }
            }
        }
    }
</script>
