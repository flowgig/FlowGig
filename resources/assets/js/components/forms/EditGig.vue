<template>
    <form method="POST" v-bind:action="formData.postUrl">
        <input type="hidden" name="_token" v-bind:value="csrfToken"/>
        <input v-if="!formData.newInstance" type="hidden" name="_method" value="PUT">
        <div v-html="gigInfoGridElement"></div>
        <div class="input-group float-right">
            <div v-html="registerButton"></div>
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
                    gigInfo: [
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "name",
                            name: "name",
                            label: "Name",
                            type: "text",
                            placeholder: "Name of the gig",
                            value: !this.formData.newInstance ? this.formData.savedValues.name : '',
                            attributes: ["required"]
                        }),
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "venue",
                            name: "venue",
                            label: "Venue",
                            type: "text",
                            placeholder: "Venue the gig takes place",
                            value: !this.formData.newInstance ? this.formData.savedValues.venue : '',
                        }),
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "location",
                            name: "location",
                            label: "Location",
                            type: "text",
                            placeholder: "Location of the gig",
                            value: !this.formData.newInstance ? this.formData.savedValues.location : '',
                        }),
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "date",
                            name: "date",
                            label: "Date",
                            type: "text",
                            value: !this.formData.newInstance ? this.formData.savedValues.date : '',
                        }),
                        quark.Molecules.FormElements.SelectList.getModule({
                            id: "status",
                            name: "status",
                            label: "Status",
                            searchable: true,
                            placeholder: "Status for the gig",
                            value: !this.formData.newInstance ? this.formData.savedValues.status : '',
                            options: require("../../data/gigStatuses.json")
                        }),
                    ]
                },
                registerButton: quark.Atoms.Buttons.Button.getModule({
                    submit: true,
                    theme: 'primary',
                    content: this.formData.newInstance ? 'Create' : 'Update'
                }),
                csrfToken: window.Laravel.csrfToken,
                gigInfoGridElement: ''
            }
        },
        created ()
        {
            this.gigInfoGridElement = this.getGigInfoGridElement(this.formElements.gigInfo);
        },
        methods: {
            getGigInfoGridElement: function (formElements) {
                let gridItems = [];
                formElements.forEach(function (formElement) {
                    gridItems.push({
                        sizes: {
                            phone: 12,
                            tablet: 6,
                            tabletLandscape: 6,
                            screen: 6
                        },
                        content: formElement
                    });
                }.bind(this));
                return quark.Molecules.Sections.Grid.getModule({
                    gridItems: gridItems
                });
            }
        }
    }
</script>
