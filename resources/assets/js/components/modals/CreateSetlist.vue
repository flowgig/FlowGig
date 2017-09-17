<script>
    import * as quark from 'quark-gui';
    import CreateSetlistTemplate from './CreateSetlistTemplate.quark';

    export default {
        name: 'CreateSetlist',
        props: ['formData'],
        template: CreateSetlistTemplate,
        data() {
            return {
                form: {
                    data: this.formData.viewType == 'create' ? {} : this.formData.savedValues,
                    readOnly: this.formData.viewType == 'show'
                },
                csrfToken: window.Laravel.csrfToken
            }
        },
        computed: {
            copyFromOptions: function (){
                let copyFromOptions = [];
                this.formData.savedValues.gigsWithSetlist.forEach(function (gigWithSetlist){
                    copyFromOptions.push({
                        name: gigWithSetlist.name + ', ' + gigWithSetlist.date,
                        value: gigWithSetlist.id
                    });
                })
                return copyFromOptions;
            }
        }
    }
</script>
