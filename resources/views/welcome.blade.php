<!DOCTYPE html>
<html>
<head>
    <title>FlowGig</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
            background: url("/images/jpg/background.jpg");
            background-size: cover;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
            background-color: rgba(0, 0, 0, .5);
        }

        .content {
            text-align: left;
            display: inline-block;
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
            max-width: 100%;
            border-radius: 7px;
        }

        .login-box > .content {
            margin-top: 10px;
            width: 100%;
            max-width: 100%;
        }

        button[disabled]:hover {
            cursor: not-allowed;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">
            <img src="/images/svg/flowgig-logo-white.svg" alt="FlowGig logo"/>
        </div>
        <div class="box z-2 login-box">
            <div class="content">
                <div class="input-group">
                    <input id="username" type="text"/><label for="username">Username</label>
                </div>
                <div class="input-group">
                    <input id="password" type="password"/><label for="password">Password</label>
                </div>
                <div class="input-group float-right">
                    <button class="button button-flat" disabled="disabled">Register</button>
                    <button class="button button-primary">Log in</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/all.js" type="application/javascript"></script>
</body>
</html>
