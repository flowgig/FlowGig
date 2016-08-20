<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-size: 16pt;
            font-family: 'Lato', Helvetica, Arial, sans-serif;;
            background-color: #FFFFFF;
            padding: 1.5cm 2cm;
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

        .song-number {
            width: 30px;
            margin: 0;
            padding: 0;
            display: inline-block;
        }

        div.setlist .setlist-song {
            padding: 10px 0;
            display: block;
            border-bottom: 1px solid #eee;
        }

        div.setlist .setlist-song .song-info {
            padding-left: 40px;
            font-size: 12pt;
            line-height: 16pt;
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
    </style>
</head>
<body>
<p>{{ $setlist->band->name }}</p>
<h1>{{ $setlist->title }}</h1>
<small>{{ $setlist->description }}</small><br /><br />
<div class="setlist">
    @foreach($setlist->setlistSongs->sortBy('number_in_list') as $setlistSong)
        <div class="setlist-song">
            @if ($request->input('number_in_list'))
                <span class="song-number">{{ $setlistSong->number_in_list }}</span>
            @endif
            {{ $setlistSong->song->title }}
            <div class="song-info">
                <div class="inline">
                    @if ($request->input('key') && $setlistSong->key)
                        <span class="key"><strong>Key: </strong>{{ $setlistSong->key }}</span>
                    @endif
                    @if ($request->input('bpm') && $setlistSong->bpm)
                        <span class="bpm"><strong>BPM: </strong>{{ $setlistSong->bpm }}</span>
                    @endif
                    @if ($request->input('duration') && $setlistSong->duration)
                        <span class="intensity"><strong>Duration: </strong>{{ $setlistSong->duration }}</span>
                    @endif
                    @if ($request->input('intensity') && $setlistSong->intensity)
                        <span class="intensity"><strong>Intensity: </strong>{{ $setlistSong->intensity }}</span>
                    @endif
                </div>
                <!--
                <div class="inline instruments">
                    <strong>Instruments: </strong>
                    <span>Banjo</span>
                    <span>Organ</span>
                </div>
                -->
                <div class="comment">
                    @if ($request->input('comment') && $setlistSong->comment)
                        <span><strong>Comment: </strong><i>{{ $setlistSong->comment }}</i></span>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
{{-- <span class="footer-text">Generated with <a href="http://www.flowgig.com">www.flowgig.com</a></span> --}}
</body>
</html>

