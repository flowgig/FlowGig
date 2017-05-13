<template>
    <div class="box z-2 login-box">
        <div class="content">
            <div class="login-box-header">
                <p>Log in</p>
            </div>
            <div v-html="inputEmail"></div>
            <div v-html="inputPassword"></div>
            <div v-html="checkboxRemember"></div>

            <div class="input-group float-right">
                <a class="button button-flat button-primary" href="/login">Log in</a>
            </div>
            <div class="clearfix"></div>

            <div class="input-group text-center">
                <a href="https://flowgig.com/password/reset">Forgot Your Password?</a>
            </div>
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
                    type: "email"
                }),
                inputPassword: quark.Molecules.FormElements.InputField.getModule({
                    id: "login-password",
                    name: "password",
                    label: "Password",
                    type: "password"
                }),
                checkboxRemember: quark.Molecules.FormElements.Checkbox.getModule({
                    id: "login-remember",
                    name: "remember",
                    label: "Remember Me",
                    value: "true"
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .input-group {
        text-align: left;
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

    button[disabled]:hover {
        cursor: not-allowed;
    }

    .login-box > .content {
        zoom: 1.2;
        padding: 0;
    }

    .input-group input[type="text"] + label,
    .input-group input[type="password"] + label,
    .input-group input[type="number"] + label,
    .input-group input[type="email"] + label,
    .input-group input[type="checkbox"]:not(:focus),
    .input-group input[type="radio"]:not(:focus),
    .input-group select + label {
        color: #CCC;
    }

    .input-group input[type="text"].is-not-empty,
    .input-group input[type="text"]:focus.is-not-empty,
    .input-group input[type="password"].is-not-empty,
    .input-group input[type="password"]:focus.is-not-empty,
    .input-group input[type="number"].is-not-empty,
    .input-group input[type="number"]:focus.is-not-empty,
    .input-group input[type="search"].is-not-empty,
    .input-group input[type="search"]:focus.is-not-empty,
    .input-group input[type="email"].is-not-empty,
    .input-group input[type="email"]:focus.is-not-empty,
    .input-group select.is-not-empty,
    .input-group select.is-not-empty:focus {
        color: #FFF;
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
            padding: 6px 12px;
        }

        .input-group {
            margin-bottom: 25px;
        }

        .input-group input[type="text"] + label,
        .input-group input[type="password"] + label,
        .input-group input[type="number"] + label,
        .input-group input[type="email"] + label,
        .input-group input[type="checkbox"]:not(:focus),
        .input-group input[type="radio"]:not(:focus),
        .input-group select + label {
            color: #777;
        }

        .input-group input[type="text"].is-not-empty,
        .input-group input[type="text"]:focus.is-not-empty,
        .input-group input[type="password"].is-not-empty,
        .input-group input[type="password"]:focus.is-not-empty,
        .input-group input[type="number"].is-not-empty,
        .input-group input[type="number"]:focus.is-not-empty,
        .input-group input[type="search"].is-not-empty,
        .input-group input[type="search"]:focus.is-not-empty,
        .input-group input[type="email"].is-not-empty,
        .input-group input[type="email"]:focus.is-not-empty,
        .input-group select.is-not-empty,
        .input-group select.is-not-empty:focus {
            color: #212121;
        }
    }
</style>
