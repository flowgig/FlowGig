<script>
    import * as quark from 'quark-gui';
    import GigTemplate from './GigTemplate.quark';

    export default {
        name: 'Gig',
        props: ['listItem'],
        template: GigTemplate,
        computed: {
            statusIconClass: function () {
                let statusIconClass = '';
                if (this.listItem.status !== undefined) {
                    //TODO add title attribute for icons
                    if (this.listItem.status == 'Proposed') {
                        statusIconClass = 'fa fa-question-circle-o'
                    } //Title: Status: Proposed
                    if (this.listItem.status == 'Settled') {
                        statusIconClass = 'fa fa-check-circle-o'
                    } //Title: Status: Settled
                    if (this.listItem.status == 'Public') {
                        statusIconClass = 'fa fa-globe'
                    } //Title: Status: Public
                }
                return statusIconClass;
            },
            subTitle: function () {
                let subTitle = this.listItem.date + ' - ' + this.listItem.venue + ' - ' + this.listItem.location;
                return subTitle;
            },
            links: function () {
                return {
                    show: '/gigs/' + this.listItem.id,
                    edit: '/gigs/' + this.listItem.id + '/edit'
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
