<!DOCTYPE html>
<html>
<head>
    <title>FlowGig - @yield('title')</title>
    @include('layouts.header')

    <style>
        html, body {
            height: 100%;
        }

        body.welcome-screen {
            margin: 0;
            padding: 0;
            width: 100%;
            display: block;
            background: url("/images/jpg/background.jpg");
            background-size: cover;
        }

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

        .login-box .login-box-header p{
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

        @media screen and (min-width: 550px) {
            body.welcome-screen {
                display: table;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                display: inline-block;
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

            .login-box .login-box-header p{
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
    </style>
</head>
<body class="welcome-screen">
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-79197814-1', 'auto');
    ga('send', 'pageview');

</script>
<div class="container">
    <div class="content">
        <div class="title">
            <img src="/images/svg/flowgig-logo-white.svg" alt="FlowGig logo"/>
        </div>
        <div class="box z-2 login-box">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>