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
{{--
@include('layouts.navbar', ['currentBand' => isset($currentBand) ? $currentBand : null])
{{-- TODO: Use ['currentBand' => $currentBand ?? null] when on PHP 7 --}}

{{-- @yield('actionbar') --}}
<div id="app">
    @if(isset($currentBand))
        <main-navigation v-bind:current-band='{id: "{{ $currentBand->id }}", name: "{{ $currentBand->name }}"}'
                         v-bind:current-user='{name: "{{ Auth::user()->name }}", email: "{{ Auth::user()->email }}"}'></main-navigation>

    @else
        <main-navigation v-bind:current-user='{name: "{{ Auth::user()->name }}", email: "{{ Auth::user()->email }}"}'></main-navigation>
    @endif
    <main id="mainContent">
        <div class="main-content">
            <div id="page"></div>
            @yield('content')
        </div>
        <main-footer v-bind:app-version='"{{ $flowGigVersion }}"'></main-footer>
    </main>
</div>
@yield('scripts')
<script src="/js/manifest.js" type="application/javascript"></script>
<script src="/js/vendor.js" type="application/javascript"></script>
<script src="/js/app.js" type="application/javascript"></script>

</body>
</html>