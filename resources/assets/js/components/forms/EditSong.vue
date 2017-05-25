<template>
    <form method="POST" v-bind:action="formData.postUrl">
        <input type="hidden" name="_token" v-bind:value="csrfToken"/>
        <input v-if="!formData.newInstance" type="hidden" name="_method" value="PUT">
        <div v-html="formElements.title"></div>
        <div v-html="formElements.artist"></div>
        <div v-html="formElements.lyricsBy"></div>
        <div v-html="formElements.musicBy"></div>
        <p>You may set the following values different every time you add this song to a setlist,
            but values entered here will be used as default</p>
        <div v-html="formElements.key"></div>
        <div v-html="formElements.bpm"></div>
        <div v-html="formElements.duration"></div>
        <div v-html="formElements.intensity"></div>
        <div class="input-group float-right">
            <div v-html="formElements.submit"></div>
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
                    title: quark.Molecules.FormElements.InputField.getModule({
                        id: "title",
                        name: "title",
                        label: "Title",
                        type: "text",
                        placeholder: "The song title",
                        value: !this.formData.newInstance ? this.formData.savedValues.title : '',
                        attributes: ["required"]
                    }),
                    artist: quark.Molecules.FormElements.InputField.getModule({
                        id: "artist",
                        name: "artist",
                        label: "Artist",
                        type: "text",
                        placeholder: "The original artist/band",
                        value: !this.formData.newInstance ? this.formData.savedValues.artist : '',
                    }),
                    lyricsBy: quark.Molecules.FormElements.InputField.getModule({
                        id: "lyrics-by",
                        name: "lyrics_by",
                        label: "Lyrics by",
                        type: "text",
                        placeholder: "The lyrics author",
                        value: !this.formData.newInstance ? this.formData.savedValues.lyrics_by : '',
                    }),
                    musicBy: quark.Molecules.FormElements.InputField.getModule({
                        id: "music-by",
                        name: "music_by",
                        label: "Music by",
                        type: "text",
                        placeholder: "The music composer",
                        value: !this.formData.newInstance ? this.formData.savedValues.music_by : '',
                    }),
                    key: quark.Molecules.FormElements.SelectList.getModule({
                        id: "key",
                        name: "key",
                        label: "Key",
                        searchable: true,
                        placeholder: "E.g. F, Am, or C#",
                        value: !this.formData.newInstance ? this.formData.savedValues.key : '',
                        options: require("../../data/musicalKeys.json")
                    }),
                    bpm: quark.Molecules.FormElements.InputField.getModule({
                        id: "bpm",
                        name: "bpm",
                        label: "BPM",
                        type: "number",
                        placeholder: "Beats Per Minute",
                        value: !this.formData.newInstance ? this.formData.savedValues.bpm : '',
                        attributes: ["min='0'"]
                    }),
                    duration: quark.Molecules.FormElements.InputField.getModule({
                        id: "duration",
                        name: "duration",
                        label: "Duration",
                        type: "number",
                        placeholder: "Minutes",
                        value: !this.formData.newInstance ? this.formData.savedValues.duration : '',
                        attributes: ["min='0'"]
                    }),
                    intensity: quark.Molecules.FormElements.InputField.getModule({
                        id: "intensity",
                        name: "intensity",
                        label: "Intensity",
                        type: "number",
                        placeholder: "1&ndash;10 (Ballad&ndash;Bebop)",
                        value: !this.formData.newInstance ? this.formData.savedValues.intensity : '',
                        attributes: ["min='0'", "max='10'"]
                    }),
                    submit: quark.Atoms.Buttons.Button.getModule({
                        submit: true,
                        theme: 'primary',
                        content: this.formData.newInstance ? 'Create' : 'Update'
                    })
                },
                csrfToken: window.Laravel.csrfToken,
                songInfoGridElement: '',
                defaultValuesGridElement: ''
            }
        }
    }
</script>
