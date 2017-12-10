<script>
    import * as quark from 'quark-gui';
    import RepertoireSongTemplate from './RepertoireSongTemplate.quark';

    export default {
        name: 'RepertoireSong',
        props: ['listItem'],
        template: RepertoireSongTemplate,
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
