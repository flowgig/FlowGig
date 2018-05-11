<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-size: 16pt;
            font-family: DejaVu Sans;
            /*font-family: 'Lato', Helvetica, Arial, sans-serif;;*/
            background-color: #FFFFFF;
            padding: 1.5cm 2cm;
        }

        h1 {
            font-size: 24pt;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        div {
            margin: 0;
            padding: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            page-break-after: avoid;
        }

        a {
            text-decoration: none;
            color: black;
        }

        div.setlist {
            font-size: 18pt;
            line-height: 24pt;
        }

        div.setlist .setlist-song {
            padding: 10px 0;
            display: block;
            border-bottom: 1px solid #eee;
        }

        div.setlist .setlist-song .song-info * {
            margin-left: 10px;
            font-size: .8em
        }

        div.setlist div.inline span {
            display: inline;
        }

        div.setlist div.inline span:after {
            content: ",";
        }

        div.setlist div.inline span:last-child:after {
            content: "";
        }

        .footer-text {
            display: block;
            margin-top: 40px;
        }
        .pre-heading {
            font-size: 16px;
            margin-bottom: -24px;
        }
        .post-heading {
            font-size: 18px;
            margin-top: -28px;
        }
    </style>
    <title>FlowGig - Setlist for {{ $setlist->gig->band->name }}, {{ $setlist->gig->composedTitle() }}</title>
</head>
<body>
@if($setlist->gig->event)
    <p class="pre-heading">Setlist for {{ $setlist->gig->band->name }} at </p>
    <h1>{{ $setlist->gig->event }}</h1>
@else
    <p class="pre-heading">Setlist for</p>
    <h1>{{ $setlist->gig->band->name }}</h1>
@endif
<p class="post-heading">{{ $setlist->gig->composedTitle() }}</p>
<div class="setlist">
    @foreach($setlist->setlistSongs->sortBy('number_in_list') as $setlistSong)
        <div class="setlist-song">
            {{ $setlistSong->song->title }}
            <span class="song-info">
                @if ($request->input('key') && $setlistSong->key)
                    <span>{{ $setlistSong->key }}</span>
                @endif
                @if ($request->input('bpm') && $setlistSong->bpm)
                    <span>&#9833;{{ $setlistSong->bpm }}</span>
                @endif
                @if ($request->input('comment') && $setlistSong->comment)
                    <i>{{ $setlistSong->comment }}</i>
                @endif
            </span>
        </div>
    @endforeach
</div>
<br /><small style="font-size: .6em">Last changed {{ $setlist->updated_at }} UTC</small>
{{-- <span class="footer-text">Generated with <a href="http://www.flowgig.com">www.flowgig.com</a></span> --}}
</body>
</html>

