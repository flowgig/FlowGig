<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'CustomButtonRow',
        props: ['buttonRow'],
        data () {
            return {
                htmlContent: ""
            }
        },
        created: function () {
            this.htmlContent = quark.Molecules.Buttons.ButtonRow.getModule(this.buttonRow);
        }
    }
</script>
