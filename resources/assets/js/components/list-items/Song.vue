<script>
    import * as quark from 'quark-gui';
    import SongTemplate from './SongTemplate.quark';

    export default {
        name: 'Song',
        props: ['listItem'],
        template: SongTemplate,
        computed: {
            subTitle: function () {
                let subTitle = this.listItem.artist;
                return subTitle;
            },
            links: function () {
                return {
                    show: '/songs/' + this.listItem.id,
                    edit: '/songs/' + this.listItem.id + '/edit'
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
