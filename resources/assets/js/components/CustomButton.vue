<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'CustomButton',
        props: ['button'],
        data () {
            return {
                htmlContent: ""
            }
        },
        created: function () {
            this.htmlContent = quark.Atoms.Buttons.Button.getModule(this.button);
        }
    }
</script>
