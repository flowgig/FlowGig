<html prefix="og: http://ogp.me/ns#">
<head>
    <title>FlowGig - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- TODO Add keywords and description
    <meta name="description" content="">
    <meta name="keywords" content="">
    -->
    <meta name="robots" content="follow">
    <!-- Google Site Verification -->
    <meta name="google-site-verification" content="upfbbdBwiPSVWNW7UurPq7Rjhi_NhYU9PdBPYivSOE8"/>
    <!-- OpenGraph -->
    <!-- TODO Add OpenGraph description -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="FlowGig">
    <meta property="og:title" content="FlowGig - @yield('title')">
    <meta property="og:description" content="">
    <meta property="og:url" content="http://flowgig.com">

    <!-- Twitter -->
    <!-- TODO Add metadata for Twitter cards
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@app-page">
    <meta name="twitter:creator" content="@creator-page">
    <meta name="twitter:title" content="Set One's Cap Official Website">
    <meta name="twitter:description" content="">
    <meta name="twitter:image:src" content="">
    -->

    <meta name="apple-mobile-web-app-title" content="FlowGig">
    <meta name="application-name" content="FlowGig">
    <meta name="apple-mobile-web-app-title" content="FlowGig">
    <meta name="application-name" content="FlowGig">
    <meta name="apple-mobile-web-app-title" content="FlowGig">
    <meta name="application-name" content="FlowGig">
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/images/favicon/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="/images/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/images/favicon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/images/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/images/favicon/manifest.json">
    <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#c32a22">
    <link rel="shortcut icon" href="/images/favicon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="FlowGig">
    <meta name="application-name" content="FlowGig">
    <meta name="msapplication-TileColor" content="#c32a22">
    <meta name="msapplication-TileImage" content="/images/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">


    <script src="/js/all.js" type="application/javascript"></script>
    <style>

        .left-menu > div ul li a {
            padding: 10px 20px;
        }

        .left-menu > div .sidenav-logo img {
            margin-left: 25px;
            margin-top: 5px;
        }

        .navbar-page-title {
            color: #FFFFFF;
            font-size: 28px;
            line-height: 48px;
            vertical-align: bottom;
        }

        @media only screen and (min-width: 750px) {
            .navbar-page-title {
                line-height: 64px;
            }
        }
        footer{
            background-color: #afb1b3;
        }


    </style>
</head>
<body>
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
<nav class="navbar navbar-dark z-2">
    <a class="sidenav-toggle hide-big"><i class="sidenav-toggle-logo fa fa-bars"></i></a>
    <a class="logo" href="/">
        <img src="/images/svg/flowgig-logo-white.svg" alt="FlowGig logo">
    </a>
    <span class="menu-divider hide-xsmall"></span>
    <span class="hide-big hide-xsmall navbar-page-title"> @yield('navbar-title')</span>
    <div class="main-menu-user float-right hide-xsmall">
        <!-- <ul>
             <li><a href="#">My account</a></li>
         </ul> -->
    </div>
    <div class="main-menu hide-medium hide-small hide-xsmall float-right">
        <div class="menu-link">
            <ul class="">
                <li><a href="/song">Songs</a></li>
                <li><a href="/setlist">Setlists</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="left-menu no-padding">
    <div>
        <div class="sidenav-logo">
            <a class="sidenav-toggle">
                <img src="/images/svg/flowgig-logo-black.svg" alt="FlowGig logo">
                <i class="fa fa-angle-left float-right"></i>
                <span class="clearfix"></span>
            </a>
        </div>
        <ul class="">
            <li><a href="/song"><i class="icon fa fa-music"></i> Songs</a></li>
            <li><a href="/setlist"><i class="icon fa fa-list-ol"></i> Setlists</a></li>
        </ul>
    </div>
</div>

@yield('content')

<footer>
    <div class="container">
        <div class="row">
            <div class="text-center">
                <img src="/images/svg/flowgig-logo-black.svg" style="width: 150px; opacity: .4;" />
                <p>FlowGig licensed under <a href="https://github.com/flowgig/flowgig/blob/master/LICENSE">GNU General Public License</a></p>
                <p><a href="#">About</a> - <a href="#">Developers</a> - <a href="#">Send feedback</a></p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>