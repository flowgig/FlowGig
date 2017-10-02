<!DOCTYPE html>
<html>
<head>
    <title>FlowGig - @yield('title')</title>
    @include('layouts.header')
    <!-- Piwik -->
    <script type="text/javascript">
        var _paq = _paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//analytics.flowgig.com/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', '1']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>
    <!-- End Piwik Code -->
    <style>
        body.welcome-screen {
            background-attachment: fixed;
            overflow: auto;
        }
    </style>
</head>
<body>
<div id="app">
    @yield('content')
</div>
@yield('scripts')
<script src="/js/manifest.js" type="application/javascript"></script>
<script src="/js/vendor.js" type="application/javascript"></script>
<script src="/js/app.js" type="application/javascript"></script>
</body>
</html>