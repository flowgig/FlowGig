<template>

</template>
<script>
    import * as quark from 'quark-gui';
    export default {
        name: 'SetlistSong',
        props: ['formData', 'setlistSongId'],
        data () {
            return {
                formElements: {
                    key: quark.Molecules.FormElements.SelectList.getModule({
                        id: "setlist-song-modal-key-" + this.formData.savedValues.id,
                        name: "key",
                        label: "Key",
                        searchable: true,
                        placeholder: "E.g. F, Am, or C#",
                        value: this.formData.savedValues !== undefined && this.formData.savedValues.key !== undefined ? this.formData.savedValues.key : '',
                        options: require("../../data/musicalKeys.json"),
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : []
                    }),
                    bpm: quark.Molecules.FormElements.InputField.getModule({
                        id: "setlist-song-modal-bpm-" + this.formData.savedValues.id,
                        name: "bpm",
                        label: "BPM",
                        type: "number",
                        placeholder: "Beats Per Minute",
                        value: this.formData.savedValues !== undefined && this.formData.savedValues.bpm !== undefined ? this.formData.savedValues.bpm : '',
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : ["min='0'"]
                    }),
                    duration: quark.Molecules.FormElements.DatePicker.getModule({
                        id: "setlist-song-modal-duration-" + this.formData.savedValues.id,
                        name: "duration",
                        label: "Duration",
                        type: "time",
                        placeholder: "03:25",
                        value: this.formData.savedValues !== undefined && this.formData.savedValues.duration !== undefined ? this.formData.savedValues.duration : '',
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : [],
                        clockOptions: {
                            showHours: false
                        }
                    }),
                    intensity: quark.Molecules.FormElements.InputField.getModule({
                        id: "setlist-song-modal-intensity-" + this.formData.savedValues.id,
                        name: "intensity",
                        label: "Intensity",
                        type: "number",
                        placeholder: "1&ndash;10 (Ballad&ndash;Bebop)",
                        value: this.formData.savedValues !== undefined && this.formData.savedValues.intensity !== undefined ? this.formData.savedValues.intensity : '',
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : ["min='0'", "max='10'"]
                    }),
                    comment: quark.Molecules.FormElements.InputField.getModule({
                        id: "setlist-song-modal-comment-" + this.formData.savedValues.id,
                        name: "comment",
                        label: "Comment",
                        value: this.formData.savedValues !== undefined && this.formData.savedValues.comment !== undefined ? this.formData.savedValues.comment : '',
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
        created: function () {
            this.$parent.setlistSongModalButtons[this.setlistSongId] = this.createModalElement();
        },
        methods: {
            getActionButtonText: function () {
                let actionButtonText = '';
                if (this.formData.viewType == 'create') actionButtonText = 'Create';
                else if (this.formData.viewType == 'edit') actionButtonText = 'Update';
                else if (this.formData.viewType == 'show') actionButtonText = 'Edit';
                return actionButtonText;
            },
            createModalContent: function () {
                let tokenInputElement = '';
                let methodInputElement = '';
                if (this.formData.viewType !== 'show') {
                    tokenInputElement = `<input type="hidden" name="_token" value="${this.csrfToken}"/>`;
                }
                if (this.formData.viewType == 'edit') {
                    methodInputElement = `<input type="hidden" name="_method" value="PUT">`;
                }
                let inputElements = `${tokenInputElement}${methodInputElement}${this.formElements.key}${this.formElements.bpm}${this.formElements.duration}${this.formElements.intensity}${this.formElements.comment}`;
                let actionButtonElement = `<div class="input-group float-right">${this.formElements.actionButton}</div>`;
                return `<form method="POST" action="${this.formData.postUrl}">${inputElements}${actionButtonElement}<div class="clearfix"></div></form>`;
            },
            createModalElement: function () {
                return quark.Molecules.Messaging.Modal.getModule({
                    id: 'setlist-song-modal-' + this.formData.savedValues.id,
                    triggerElement: quark.Atoms.Buttons.Button.getModule({
                        iconClass: 'fa fa-pencil',
                        type: 'minimal',
                        theme: 'primary'
                    }),
                    modalElement: {
                        title: 'Setlist song',
                        content: this.createModalContent(),
                        scrollable: true
                    }
                });
            }
        }
    }
</script>
