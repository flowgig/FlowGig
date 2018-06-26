<!doctype html>
<html lang="{{ app()->getLocale() }}">
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
            @if(env('APP_ENV') == 'production')
                _paq.push(['setSiteId', '1']);
            @elseif(env('APP_ENV') == 'development')
                _paq.push(['setSiteId', '2']);
            @endif
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

        .modal {
            padding-top: 0;
        }

        .modal .modal-header {
            position: fixed;
            width: 100%;
            display: block;
            box-shadow: none;
            padding: 8px 16px;
            background-color: #f4f5f6;
            margin: -16px;
        }

        .modal .modal-content {
            padding-top: 48px;
        }

        @media only screen and (min-width: 1160px) {
            .modal .modal-header {
                max-width: 870px;
                margin: 0;
            }
            .modal .modal-content {
                margin-top: 48px;
                padding-top: 0;
            }
        }
    </style>
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
@include('privacy-modal')
</body>
</html>