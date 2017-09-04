<script>
    import * as quark from 'quark-gui';
    import GigTemplate from './GigTemplate.quark';

    export default {
        name: 'Gig',
        props: ['formData'],
        template: GigTemplate,
        data() {
            return {
                form: {
                    data: this.formData.viewType == 'create' ? {} : this.formData.savedValues,
                    readOnly: this.formData.viewType == 'show'
                },
                csrfToken: window.Laravel.csrfToken
            }
        }
    }
</script>
