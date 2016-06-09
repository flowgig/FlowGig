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
<meta name="theme-color" content="#ffffff"></head>

<script src="/js/all.js" type="application/javascript"></script>
<style>
    .handle{
        font-family: FontAwesome;
        font-style: normal;
    }
    .handle:before {

        content: "\f047";
    }
    .sortable-chosen{
        background-color: rgba(195, 42, 34, 0.15);
        cursor: move;
    }
    .list li{
        transition: background .2s .1s;
        border-left: 4px solid transparent;
    }
    .list li:hover{
       /* border-left: 4px solid #C32A22;*/
    }

    .list.sortable-list:hover,
    .list.sortable-list:active{
        cursor: move;
    }

    .action-button .icon{
        text-align: center;
        width: 100%;
        display: inline-block;
        font-size: 28pt;
        line-height: 56px;
    }


</style>
<body>
<nav class="navbar navbar-dark z-2">
    <a class="sidenav-toggle hide-big"><i class="sidenav-toggle-logo fa fa-bars"></i></a>
    <a class="logo">
        <img src="/images/svg/flowgig-logo-white.svg" alt="FlowGig logo">
    </a>
    <span class="menu-divider hide-xsmall"></span>
    <span class="hide-big hide-xsmall"></span>
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
            </a>
        </div>
        <ul class="">
            <li><a href="/song">Songs</a></li>
            <li><a href="/setlist">Setlists</a></li>
        </ul>
    </div>
</div>
<div class="main-content">
    <div class="container">
        @yield('content')
    </div>
</div>
</body>
</html>