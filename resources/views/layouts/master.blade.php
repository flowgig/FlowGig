<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
    <title>FlowGig - @yield('title')</title>
    @include('layouts.header')
    <style>
        html, body {
            background-image: none;
        }

        .list-title {
            display: block;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding: 5px 14px;
            background-color: #f6f7f8;
        }
    </style>
</head>
<body id="app">
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

@include('layouts.navbar', ['currentBand' => isset($currentBand) ? $currentBand : null])
{{-- TODO: Use ['currentBand' => $currentBand ?? null] when on PHP 7 --}}

@yield('actionbar')
<header id="header"></header>
<div class="main-content">
    <div class="container">
        <div id="page"></div>
        @yield('content')
        <footer>
            <div class="container">
                <div class="text-center">
                    <img src="/images/svg/flowgig-logo-black.svg" alt="FlowGig logo"
                         style="width: 150px; opacity: .4;"/>
                    <p>FlowGig licensed under
                        <a href="https://github.com/flowgig/flowgig/blob/master/LICENSE">GNU General Public License</a>
                    </p>
                    <p><a href="#">About</a> - <a href="#">Developers</a> - <a href="#">Send feedback</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>
@yield('scripts')
</body>
</html>