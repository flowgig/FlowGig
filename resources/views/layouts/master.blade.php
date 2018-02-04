<!doctype html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">
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
        .row:after {
            content: "";
            clear: both;
            display: block;
        }
        input[type=checkbox]:before {
            content: "\f096";
            display: inline-block;
            width: 16px;
        }
        .input-group input[type=text].is-not-empty:disabled,
        .input-group input[type=password].is-not-empty:disabled,
        .input-group input[type=number].is-not-empty:disabled,
        .input-group input[type=search].is-not-empty:disabled,
        .input-group input[type=email].is-not-empty:disabled {
            color: #777;
        }
        label.input-field-height {
            margin-top: 22px;
            display: inline-block;
        }
        textarea {
            width: 100%;
            max-height: 300px;
            resize: none;
            padding: 5px 0 5px 8px;
            outline: none;
            border: none;
            border-bottom: 2px solid #eee;
            transition: border .2s;
            overflow-x: hidden;
            overflow-y: scroll;
            overflow-wrap: break-word;
            font-family: inherit;
            color: black;
        }

        textarea:focus {
            outline: none !important;
            border-bottom: 2px solid #c32a22;
        }

        .textarea-label {
            margin-left: 8px;
            color: #777
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

        @media only screen and (min-width: 1160px) {
            .modal .modal-header {
                max-width: 870px;
                margin: 0;
            }
        }

        .modal .modal-content {
            padding-top: 48px;
        }

    </style>
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
<body>


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