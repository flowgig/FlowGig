<script>
    import * as quark from 'quark-gui';
    import InvitationTemplate from './InvitationTemplate.quark';

    export default {
        name: 'Invitation',
        props: ['formData'],
        template: InvitationTemplate,
        data() {
            return {
                form: {
                    data: this.formData.viewType == 'create' ? {} : this.formData.savedValues,
                    readOnly: this.formData.viewType == 'show',
                    selectedInvitee: {
                        id: '',
                        email: ''
                    }
                },
                selectedInviteeValue: '',
                csrfToken: window.Laravel.csrfToken
            }
        },
        computed: {
            userOptions: function () {
                let userOptions = [];
                this.formData.savedValues.users.forEach(function (user) {
                    userOptions.push({
                        name: user.name,
                        value: JSON.stringify(user) // Until quarkGUI support objects as values
                    });
                });
                return userOptions;
            },
            messagePlaceholder: function () {
                let bandName = this.formData.savedValues.bandName;
                return `Awesome if you\'ll join ${bandName}!'`;
            }
        },
        methods: {
            updateSelectedInvitee: function () {
                console.log("invitee updated");
            }
        },
        watch: {
            selectedInviteeValue: function () {
                this.form.selectedInvitee = JSON.parse(this.selectedInviteeValue);
            }
        }
    }
</script>
