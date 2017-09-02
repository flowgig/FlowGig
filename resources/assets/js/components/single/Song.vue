<script>
    import * as quark from 'quark-gui';
    import SongTemplate from './SongTemplate.quark';
    export default {
        name: 'Song',
        props: ['formData'],
        template: SongTemplate,
        data () {
            return {
                form: {
                    data: this.formData,
                    readOnly: this.formData.viewType == 'show'
                },
                csrfToken: window.Laravel.csrfToken
            }
        },
        methods: {
            getActionButtonText: function () {
                let actionButtonText = '';
                if (this.formData.viewType == 'create') actionButtonText = 'Create';
                else if (this.formData.viewType == 'edit') actionButtonText = 'Update';
                else if (this.formData.viewType == 'show') actionButtonText = 'Edit';
                return actionButtonText;
            }
        }
    }
</script>
