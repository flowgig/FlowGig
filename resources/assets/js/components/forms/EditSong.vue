<template>
    <form method="POST" v-bind:action="formData.postUrl">
        <input type="hidden" name="_token" v-bind:value="csrfToken"/>
        <input v-if="!formData.newInstance" type="hidden" name="_method" value="PUT">
        <div v-html="songInfoGridElement"></div>
        <p>You may set the following values different every time you add this song to a setlist,
            but values entered here will be used as default</p>
        <div v-html="defaultValuesGridElement"></div>

        <div class="input-group float-right">
            <div v-html="registerButton"></div>
        </div>
        <div class="clearfix"></div>
    </form>
</template>

<script>
    import * as quark from 'quark-gui';
    export default {
        name: 'EditSong',
        props: ['formData'],
        data () {
            return {
                formElements: {
                    songInfo: [
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "title",
                            name: "title",
                            label: "Title",
                            type: "text",
                            placeholder: "The song title",
                            value: !this.formData.newInstance ? this.formData.savedValues.title : '',
                            attributes: ["required"]
                        }),
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "artist",
                            name: "artist",
                            label: "Artist",
                            type: "text",
                            placeholder: "The original artist/band",
                            value: !this.formData.newInstance ? this.formData.savedValues.artist : '',
                        }),
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "lyrics-by",
                            name: "lyrics_by",
                            label: "Lyrics by",
                            type: "text",
                            placeholder: "The lyrics author",
                            value: !this.formData.newInstance ? this.formData.savedValues.lyrics_by : '',
                        }),
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "music-by",
                            name: "music_by",
                            label: "Music by",
                            type: "text",
                            placeholder: "The music composer",
                            value: !this.formData.newInstance ? this.formData.savedValues.music_by : '',
                        })
                    ],
                    defaultValues: [
                        quark.Molecules.FormElements.SelectList.getModule({
                            id: "key",
                            name: "key",
                            label: "Key",
                            searchable: true,
                            placeholder: "F/Am/C# etc.",
                            value: !this.formData.newInstance ? this.formData.savedValues.key : '',
                            options: require("../../data/musicalKeys.json")
                        }),
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "bpm",
                            name: "bpm",
                            label: "BPM",
                            type: "number",
                            placeholder: "Beats Per Minute",
                            value: !this.formData.newInstance ? this.formData.savedValues.bpm : '',
                            attributes: ["min='0'"]
                        }),
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "duration",
                            name: "duration",
                            label: "Duration",
                            type: "number",
                            placeholder: "Minutes",
                            value: !this.formData.newInstance ? this.formData.savedValues.duration : '',
                            attributes: ["min='0'"]
                        }),
                        quark.Molecules.FormElements.InputField.getModule({
                            id: "intensity",
                            name: "intensity",
                            label: "Intensity",
                            type: "number",
                            placeholder: "1&ndash;10 (Ballad&ndash;Bebop)",
                            value: !this.formData.newInstance ? this.formData.savedValues.intensity : '',
                            attributes: ["min='0'", "max='10'"]
                        })
                    ]
                },
                registerButton: quark.Atoms.Buttons.Button.getModule({
                    submit: true,
                    theme: 'primary',
                    content: this.formData.newInstance ? 'Create' : 'Update'
                }),
                csrfToken: window.Laravel.csrfToken,
                songInfoGridElement: '',
                defaultValuesGridElement: ''
            }
        },
        created ()
        {
            this.songInfoGridElement = this.getSongInfoGridElement(this.formElements.songInfo);
            this.defaultValuesGridElement = this.getSongInfoGridElement(this.formElements.defaultValues);
        },
        methods: {
            getSongInfoGridElement: function (formElements) {
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
