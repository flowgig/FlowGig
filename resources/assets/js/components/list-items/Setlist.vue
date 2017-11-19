<script>
    import * as quark from 'quark-gui';
    import SetlistTemplate from './SetlistTemplate.quark';

    export default {
        name: 'Setlist',
        props: ['listItem', 'gig'],
        template: SetlistTemplate,
        computed: {
            links: function () {
                return {
                    show: '/setlists/' + this.listItem.id,
                    edit: '/setlists/' + this.listItem.id + '/edit'
                }
            },
            setlistName: function () {
                return `${this.gig.date} at ${this.gig.venue}, ${this.gig.location}`;
            }
        },
        data() {
            return {
                csrfToken: window.Laravel.csrfToken
            }
        }
    }
</script>
