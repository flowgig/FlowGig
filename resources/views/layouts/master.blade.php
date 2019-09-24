<!doctype html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">
<head>
    <title>FlowGig - @yield('title')</title>
    @include('layouts.header')
    <style>
        html, body {
            background-image: none;
        }

        .main-content {
            background-color: #FFFFFF;
        }

        .box {
            border-radius: 0;
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


        .label {
            border: 1px solid #e3e4e5;
            border-radius: 3px;
            padding: 3px;
            margin-bottom: 5px;
            background-color: #f4f5f6;
            text-transform: uppercase;
            font-size: 10px;
        }
        .pre-heading {
            font-size: 20px;
            margin: 25px 0 -24px 0;
        }
        .post-heading {
            font-size: 22px;
            margin-top: -18px;
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
</head>
<body>

@include('layouts.navbar', ['currentBand' => $currentBand ?? null])

@yield('actionbar')
<div class="main-content">
    <div class="container">

        @yield('content')
        <footer>
            <div class="container">
                <div class="text-center">
                    <img src="/images/svg/flowgig-logo-black.svg" alt="FlowGig logo"
                         style="width: 150px; opacity: .4;"/>
                    <p>
                        <small>Version {{ $flowGigVersion }}</small>
                    </p>
                    <p>
                        FlowGig is licensed under the
                        <a href="https://github.com/flowgig/flowgig/blob/master/LICENSE"
                           title="GNU General Public License" target="_blank">GNU General Public License</a>
                    </p>
                    <p>
                        <small>
                            <a href="https://github.com/flowgig/flowgig/releases" title="Release notes" target="_blank">
                                Release notes</a>
                            |
                            <button class="toggle-elements button button-icon button-flat button-default tooltip"
                                    value="privacy-modal" title="Privacy" style="font-size: .9em"
                                    onclick="_paq.push(['trackEvent', 'Privacy info', 'display', 'Privacy info - Footer'])">Privacy
                            </button>
                            |
                            <a href="https://github.com/flowgig/flowgig" title="Source code" target="_blank">
                                Source code</a>
                            |
                            <a href="https://github.com/orgs/flowgig/people" title="Developers" target="_blank">
                                Developers</a>
                        </small>
                    </p>
                </div>
            </div>
        </footer>
    </div>
</div>
@include('privacy-modal')
@yield('scripts')
<script>
    $(document).on("change", ".input-group input", function () {
        $(this).removeClass("is-not-empty");
        if ($(this).val() !== "") $(this).addClass("is-not-empty");
    });

    function showRepertoireModal() {
        document.getElementById("repertoire").style.display = "block";
    }

    function hideRepertoireModal() {
        document.getElementById("repertoire").style.display = "none";
    }

    function showExportSetlistModal() {
        document.getElementById("export-setlist").style.display = "block";
    }

    function hideExportSetlistModal() {
        document.getElementById("export-setlist").style.display = "none";
    }
</script>
</body>
</html>
