<script>
    import * as quark from 'quark-gui';
    import InvitationTemplate from './InvitationTemplate.quark';

    export default {
        name: 'Invitation',
        props: ['listItem'],
        template: InvitationTemplate,
        computed: {
            statusIconClass: function () {
                let statusIconClass = '';
                if (this.listItem.status !== undefined) {
                    //TODO add title attribute for icons
                    if (this.listItem.status == 'pending') {
                        statusIconClass = 'fa fa-hourglass-half'
                    } //Title: Status: Pending
                    if (this.listItem.status == 'expired') {
                        statusIconClass = 'fa fa-hourglass-end'
                    } //Title: Status: Expired
                    if (this.listItem.status == 'accepted') {
                        statusIconClass = 'fa fa-check'
                    } //Title: Status: Accepted
                }
                return statusIconClass;
            },
            subTitle: function () {
                let subTitle = this.listItem.invitee.email;
                return subTitle;
            },
            links: function () {
                return {
                    setExpired: '/band-invitations/' + this.listItem.id + '/set-expired',
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

<style>
    .list-item {
        border-bottom: 1px solid rgba(0, 0, 0, .1);
    }

    .list-item:last-child {
        border-bottom: none;
    }
</style>
