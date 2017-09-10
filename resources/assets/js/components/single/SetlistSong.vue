<script>
    import * as quark from 'quark-gui';
    import SetlistSongTemplate from './SetlistSongTemplate.quark';

    export default {
        name: 'SetlistSong',
        props: ['formData', 'setlistSongId'],
        template: SetlistSongTemplate,
        data() {
            return {
                form: {
                    data: this.formData.viewType == 'create' ? {} : this.formData.savedValues,
                    readOnly: this.formData.viewType == 'show'
                },
                csrfToken: window.Laravel.csrfToken
            }
        }
     /*   data () {

            let setlistSong = {
                key: {
                    id: "setlist-song-modal-key-" + this.formData.savedValues.id,
                    value: this.formData.savedValues !== undefined && this.formData.savedValues.key !== undefined ? this.formData.savedValues.key : ''
                },
                bpm: {
                    id: "setlist-song-modal-bpm-" + this.formData.savedValues.id,
                    value: this.formData.savedValues !== undefined && this.formData.savedValues.bpm !== undefined ? this.formData.savedValues.bpm : ''
                },
                duration: {
                    id: "setlist-song-modal-duration-" + this.formData.savedValues.id,
                    value: this.formData.savedValues !== undefined && this.formData.savedValues.duration !== undefined ? this.formData.savedValues.duration : ''
                },
                intensity: {
                    id: "setlist-song-modal-intensity-" + this.formData.savedValues.id,
                    value: this.formData.savedValues !== undefined && this.formData.savedValues.intensity !== undefined ? this.formData.savedValues.intensity : ''
                },
                comment: {
                    id: "setlist-song-modal-comment-" + this.formData.savedValues.id,
                    value: this.formData.savedValues !== undefined && this.formData.savedValues.comment !== undefined ? this.formData.savedValues.comment : ''
                }
            };

            return {
                setlistSong: setlistSong,
                formElements: {
                    key: quark.Molecules.FormElements.SelectList.getModule({
                        id: setlistSong.key.id,
                        name: "key",
                        label: "Key",
                        searchable: true,
                        placeholder: "E.g. F, Am, or C#",
                        value: setlistSong.key.value,
                        options: require("../../data/musicalKeys.json"),
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : []
                    }),
                    bpm: quark.Molecules.FormElements.InputField.getModule({
                        id: setlistSong.bpm.id,
                        name: "bpm",
                        label: "BPM",
                        type: "number",
                        placeholder: "Beats Per Minute",
                        value: setlistSong.bpm.value,
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : ["min='0'"]
                    }),
                    duration: quark.Molecules.FormElements.DatePicker.getModule({
                        id: setlistSong.duration.id,
                        name: "duration",
                        label: "Duration",
                        type: "time",
                        placeholder: "03:25",
                        value: setlistSong.duration.value,
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : [],
                        clockOptions: {
                            showHours: false
                        }
                    }),
                    intensity: quark.Molecules.FormElements.InputField.getModule({
                        id: setlistSong.intensity.id,
                        name: "intensity",
                        label: "Intensity",
                        type: "number",
                        placeholder: "1&ndash;10 (Ballad&ndash;Bebop)",
                        value: setlistSong.intensity.value,
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : ["min='0'", "max='10'"]
                    }),
                    comment: quark.Molecules.FormElements.InputField.getModule({
                        id: setlistSong.comment.id,
                        name: "comment",
                        label: "Comment",
                        value: setlistSong.comment.value,
                        attributes: this.formData.viewType == 'show' ? ["readonly"] : []
                    })
                },
                csrfToken: window.Laravel.csrfToken
            }
        },*/
        /*created: function () {
            this.$parent.setlistSongModalButtons[this.setlistSongId] = this.createModalElement();
        },*/
      /*  methods: {
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
                return `<div class="content-container"><form method="POST" action="${this.formData.postUrl}">${inputElements}<div class="clearfix"></div></form></div>`;
            },

            createModalElement: function () {

                let actionButton = {
                    id: "setlist-song-action-button-" + this.formData.savedValues.id,
                    theme: 'primary',
                    content: this.getActionButtonText(),
                    ajaxOptions: {
                        method: 'put',
                        url: '/setlistsongs/' + this.formData.savedValues.id,
                        data: {
                            setlist_id: this.formData.savedValues.setlist_id,
                            song_id: this.formData.savedValues.song.id,
                            number_in_list: this.formData.savedValues.number_in_list
                        },
                        getDataFromElements: true,
                        dataFromElements: [
                            {
                                name: 'key',
                                elementId: this.setlistSong.key.id + '-input'
                            },
                            {
                                name: 'bpm',
                                elementId: this.setlistSong.bpm.id
                            },
                            {
                                name: 'duration',
                                elementId: this.setlistSong.duration.id + '-input'
                            },
                            {
                                name: 'intensity',
                                elementId: this.setlistSong.intensity.id
                            },
                            {
                                name: 'comment',
                                elementId: this.setlistSong.comment.id
                            }
                        ],
                    }
                };
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
                            scrollable: true,
                            footerButtons: {
                                buttonRow: {
                                    buttons: [
                                        actionButton
                                    ]
                                }
                            }
                        }
                    }
                );
            }
        }*/
    }
</script>
