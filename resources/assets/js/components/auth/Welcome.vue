<template>
    <div class="float-right">
        <custom-button-row
                v-bind:button-row="{
                    id:'buttonRow',
                    buttons: [
                        {link: '/register', theme: 'primary', content: 'Register'},
                        {link: '/login', theme: 'primary', content: 'Log in'},
                    ]
                }">
        </custom-button-row>
    </div>
</template>

<script>
    export default {
        name: 'Welcome'
    }
</script>

<style lang="scss" scoped>

</style>
