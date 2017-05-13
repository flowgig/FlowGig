<template>
    <div class="float-right">
        <!-- <custom-button
                 v-bind:button="{link: '/register', content: 'Register'}">
         </custom-button> -->
        <custom-button
                v-bind:button="{link: '/login', theme: 'primary', content: 'Log in'}">
        </custom-button>
    </div>
</template>

<script>
    export default {
        name: 'Welcome'
    }
</script>

<style lang="scss" scoped>

</style>
