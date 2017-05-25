<template>
    <form method="POST" v-bind:action="formData.postUrl">
        <input type="hidden" name="_token" v-bind:value="csrfToken"/>
        <input v-if="!formData.newInstance" type="hidden" name="_method" value="PUT">
        <div v-html="formElements.name"></div>
        <div v-html="formElements.venue"></div>
        <div v-html="formElements.location"></div>
        <div v-html="formElements.date"></div>
        <div v-html="formElements.status"></div>
        <div class="input-group float-right">
            <div v-html="formElements.submit"></div>
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
                        value: !this.formData.newInstance ? this.formData.savedValues.name : '',
                        attributes: ["required"]
                    }),
                    venue: quark.Molecules.FormElements.InputField.getModule({
                        id: "venue",
                        name: "venue",
                        label: "Venue",
                        type: "text",
                        placeholder: "Venue the gig takes place",
                        value: !this.formData.newInstance ? this.formData.savedValues.venue : '',
                    }),
                    location: quark.Molecules.FormElements.InputField.getModule({
                        id: "location",
                        name: "location",
                        label: "Location",
                        type: "text",
                        placeholder: "Location of the gig",
                        value: !this.formData.newInstance ? this.formData.savedValues.location : '',
                    }),
                    date: quark.Molecules.FormElements.InputField.getModule({
                        id: "date",
                        name: "date",
                        label: "Date",
                        type: "text",
                        value: !this.formData.newInstance ? this.formData.savedValues.date : '',
                    }),
                    status: quark.Molecules.FormElements.SelectList.getModule({
                        id: "status",
                        name: "status",
                        label: "Status",
                        searchable: true,
                        placeholder: "Status for the gig",
                        value: !this.formData.newInstance ? this.formData.savedValues.status : '',
                        options: require("../../data/gigStatuses.json")
                    }),
                    submit: quark.Atoms.Buttons.Button.getModule({
                        submit: true,
                        theme: 'primary',
                        content: this.formData.newInstance ? 'Create' : 'Update'
                    })
                },
                csrfToken: window.Laravel.csrfToken,
                gigInfoGridElement: ''
            }
        }
    }
</script>
