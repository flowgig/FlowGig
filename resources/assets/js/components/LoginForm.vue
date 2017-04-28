<template>
    <div class="welcome-screen">
        <div class="container">
            <div class="content">
                <div class="title" v-html="logo"></div>
                <div class="box z-2 login-box">
                    <div v-html="inputEmail"></div>
                    <div v-html="inputPassword"></div>
                </div>
                <div class="input-group float-right">
                    <a class="button button-flat button-primary" href="/login">Log in</a>
                    <div class="clearfix"></div>
                </div>
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
                htmlContent: this.createFooterElement(),
                logo: quark.Atoms.Media.Image.getModule({
                    src: require('../../images/svg/flowgig-logo-white.svg'),
                    alt: "FlowGig logo"
                }),
                inputEmail: quark.Molecules.FormElements.InputField.getModule({
                    name: "email",
                    label: "E-Mail Address",
                    type: "email"
                }),
                inputPassword: quark.Molecules.FormElements.InputField.getModule({
                    name: "password",
                    label: "Password",
                    type: "password"
                })
            }
        },
        methods: {
            createFooterElement: function () {
                var footerElement = quark.Organisms.Global.Footer.getModule({
                    logo: {
                        image: {
                            src: require('../../images/svg/flowgig-logo-gray.svg'),
                            alt: 'quarkGUI logo'
                        },
                        url: '/'
                    },
                    content: `
                        <div class="text-center">
                            <p>FlowGig licensed under <a href="https://github.com/flowgig/flowgig/blob/master/LICENSE">GNU General Public License</a></p>
                            <p><a href="#">About</a> - <a href="#">Developers</a> - <a href="#">Send feedback</a></p>
                        </div>
			        `
                });
                return footerElement;
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

        .button {
            width: 100%;
            margin: 10px 0;
        }

        .button-flat[disabled] {
            color: rgba(255, 255, 255, 0.26) !important;
            background-color: rgba(255, 255, 255, 0.1);
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

            .button {
                width: auto;
                margin: 0 8px;
            }

            .button-flat[disabled] {
                color: rgba(0, 0, 0, 0.26) !important;
            }
        }
    }
</style>
