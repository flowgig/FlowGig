<template>
    <div class="box z-2 login-box">
        <div class="content">
            <form method="POST" v-bind:action="$parent.formData.loginUrl">
                <input type="hidden" name="_token" v-bind:value="csrfToken"/>
                <div class="login-box-header">
                    <p>Log in</p>
                </div>
                <div v-html="inputEmail"></div>
                <div v-html="inputPassword"></div>
                <div v-html="checkboxRemember" class="checkbox-container"></div>

                <div class="input-group float-right">
                    <div v-html="loginButton"></div>
                </div>
                <div class="clearfix"></div>

                <div class="text-center">
                    <a v-bind:href="$parent.formData.resetUrl">Forgot Your Password?</a>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import * as quark from 'quark-gui';
    export default {
        name: 'LoginForm',
        data () {
            return {
                inputEmail: quark.Molecules.FormElements.InputField.getModule({
                    id: "login-email",
                    name: "email",
                    label: "E-Mail Address",
                    type: "email",
                    value: this.$parent.formData.oldEmail,
                    attributes: ["required", "autofocus"]
                }),
                inputPassword: quark.Molecules.FormElements.InputField.getModule({
                    id: "login-password",
                    name: "password",
                    label: "Password",
                    type: "password",
                    attributes: ["required"]
                }),
                checkboxRemember: quark.Molecules.FormElements.Checkbox.getModule({
                    id: "login-remember",
                    name: "remember",
                    label: "Remember Me",
                    value: "true"
                }),
                loginButton: quark.Atoms.Buttons.Button.getModule({
                    submit: true,
                    theme: "primary",
                    content: "Log in"
                }),
                csrfToken: window.Laravel.csrfToken
            }
        }
    }
</script>

<style lang="scss" scoped>
    .input-group {
        text-align: left;
        margin-bottom: 25px;
    }

    .title {
        font-size: 96px;
        color: #FFF;
        text-shadow: 0 0 20px rgba(0, 0, 0, .8);
    }

    .login-box {
        background: none;
        color: #FFF;
        width: 100%;
        margin-top: 10px;
    }

    .login-box.z-2 {
        box-shadow: none;
    }

    .login-box .login-box-header {
        font-size: 1.4em;
    }

    .login-box .login-box-header p {
        margin: -12px 0 6px;
    }

    .login-box > .content {
        width: 100%;
    }

    .text-center {
        text-align: center;
    }

    button[disabled]:hover {
        cursor: not-allowed;
    }

    .login-box > .content {
        zoom: 1.2;
        padding: 0;
    }

    .checkbox-container{
        display: inline-block;
        padding: 4px 0 2px;
    }

    @media screen and (min-width: 550px) {
        .login-box {
            max-width: 100%;
            border-radius: 7px;
            background: #FFF;
            color: #212121;
            max-width: 100%;
        }

        .login-box.z-2 {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.26);
        }

        .login-box .login-box-header p {
            margin: 4px 0 2px;
        }

        .login-box > .content {
            zoom: 1;
            padding: 6px 12px 12px;
        }

    }
</style>
