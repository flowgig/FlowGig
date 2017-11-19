<script>
    import * as quark from 'quark-gui';
    import Invitation from "../list-items/Invitation";
    import InvitationsTemplate from './InvitationsTemplate.quark';

    export default {
        name: 'Invitations',
        props: ['listItems'],
        template: InvitationsTemplate,
        components: {
            Invitation: Invitation
        }
    }
</script>
