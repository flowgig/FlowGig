<template>
    <form method="POST" v-bind:action="formData.postUrl">
        <input v-if="!formData.viewType=='show'" type="hidden" name="_token" v-bind:value="csrfToken"/>
        <input v-if="formData.viewType=='edit'" type="hidden" name="_method" value="PUT">
        <div v-html="formElements.name"></div>
        <div v-html="formElements.venue"></div>
        <div v-html="formElements.location"></div>
        <div v-html="formElements.date"></div>
        <div v-html="formElements.status"></div>
        <div class="input-group float-right">
            <div v-html="formElements.actionButton"></div>
        </div>
        <div class="clearfix"></div>
    </form>
</template>

<script>
    import * as quark from 'quark-gui';
    export default {
        name: 'EditGig',
        props: ['formData'],
        data () {
            return {
                formElements: {
                    name: quark.Molecules.FormElements.InputField.getModule({
                        id: "name",
                        name: "name",
                        label: "Name",
                        type: "text",
                        placeholder: "Name of the gig",
                        value: this.formData.savedValues !== undefined && this.formData.savedValues.name !== undefined ? this.formData.savedValues.name : '',
                        attributes: this.formData.viewType == 'show' ? ["required", "readonly"] : ["required"]
                    }),
                    venue: quark.Molecules.FormElements.InputField.getModule({
                        id: "venue",
                        name: "venue",
                        label: "Venue",
                        type: "text",
                        placeholder: "Venue the gig takes place",
                        value: this.formData.savedValues !== undefined && this.formData.savedValues.venue !== undefined ? this.formData.savedValues.venue : '',
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : []
                    }),
                    location: quark.Molecules.FormElements.InputField.getModule({
                        id: "location",
                        name: "location",
                        label: "Location",
                        type: "text",
                        placeholder: "Location of the gig",
                        value: this.formData.savedValues !== undefined && this.formData.savedValues.location !== undefined ? this.formData.savedValues.location : '',
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : []
                    }),
                    date: quark.Molecules.FormElements.InputField.getModule({
                        id: "date",
                        name: "date",
                        label: "Date",
                        type: "text",
                        value: this.formData.savedValues !== undefined && this.formData.savedValues.date !== undefined ? this.formData.savedValues.date : '',
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : []
                    }),
                    status: quark.Molecules.FormElements.SelectList.getModule({
                        id: "status",
                        name: "status",
                        label: "Status",
                        searchable: true,
                        placeholder: "Status for the gig",
                        value: this.formData.savedValues !== undefined && this.formData.savedValues.status !== undefined ? this.formData.savedValues.status : '',
                        options: require("../../data/gigStatuses.json"),
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : []
                    }),
                    actionButton: quark.Atoms.Buttons.Button.getModule({
                        submit: this.formData.viewType == 'show' ? false : true,
                        link: this.formData.viewType == 'show' ? this.formData.editLink : null,
                        theme: 'primary',
                        content: this.getActionButtonText()
                    })
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
