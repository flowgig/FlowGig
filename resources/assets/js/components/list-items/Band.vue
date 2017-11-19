<script>
    import * as quark from 'quark-gui';
    import BandTemplate from './BandTemplate.quark';

    export default {
        name: 'Band',
        props: ['listItem'],
        template: BandTemplate,
        computed: {
            links: function () {
                return {
                    show: '/bands/' + this.listItem.id,
                    edit: '/bands/' + this.listItem.id + '/edit'
                }
            }
        },
        data() {
            return {
                csrfToken: window.Laravel.csrfToken
            }
        }
    }
</script>
