<template>
    <div class="welcome-screen">
        <div class="container">
            <div class="content">
                <div class="title" v-html="logo"></div>
                <div v-if="formType == 'welcome'">
                    <welcome></welcome>
                </div>
                <div v-if="formType == 'login'">
                    <login-form></login-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LoginForm from './auth/LoginForm.vue';
    import Welcome from './auth/Welcome.vue';
    import * as quark from 'quark-gui';
    export default {
        name: 'WelcomeScreen',
        props: ['formType'],
        components: {
            welcome: Welcome,
            loginForm: LoginForm
        },
        data () {
            return {
                logo: quark.Atoms.Media.Image.getModule({
                    src: require('../../images/svg/flowgig-logo-white.svg'),
                    alt: "FlowGig logo"
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .welcome-screen {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        display: block;
        background: url("../../images/jpg/background.jpg");
        background-size: cover;
        .container {
            display: block;
            height: 100%;
            padding: 12px;
            background-color: rgba(0, 0, 0, .5);
            overflow: auto;
        }
        .content {
            text-align: left;
            display: block;
        }
        .title {
            font-size: 96px;
            color: #FFF;
            text-shadow: 0 0 20px rgba(0, 0, 0, .8);
            margin: 0 8px;
        }
    }

    @media screen and (min-width: 550px) {
        .welcome-screen {
            display: table;
            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }
            .content {
                display: inline-block;
                width: 300px;
            }
        }
    }
</style>
