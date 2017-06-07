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
</head>
<body class="welcome-screen">
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