<html>
<head>
    <title>FlowGig - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css"/>

</head>
<body>
<nav class="navbar navbar-dark z-2">
    <a class="sidenav-toggle hide-big"><i class="sidenav-toggle-logo fa fa-bars"></i></a>
    <a class="logo">FlowGig</a>
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
                <img src=""/>
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
<script src="/js/all.js" type="application/javascript"></script>
</body>
</html>