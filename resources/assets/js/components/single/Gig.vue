<script>
    import GigTemplate from './GigTemplate.quark';

    export default {
        name: 'Gig',
        props: ['url', 'method', 'values', 'setlist', 'gigsWithSetlist'],
        template: GigTemplate,
        data() {
            return {
                data: {
                    values: this.values != undefined ? this.values : {}
                }
            }
        },
        computed: {
            setlistLinks: function () {
                if (this.setlist) {
                    return {
                        create: '/setlists/',
                        show: '/setlists/' + this.setlist.id,
                        edit: '/setlists/' + this.setlist.id + '/edit'
                    }
                }else {
                    return null;
                }
            }
        },
    }
</script>
