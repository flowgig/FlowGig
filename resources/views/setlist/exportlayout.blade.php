<h1>{{ $setlist->title }}</h1>

<ul>
    @foreach($setlist->setlistSongs as $setlistSong)
        <li>{{ $setlistSong->song->title }}</li>
    @endforeach
</ul>

<hr />
<i>Generated with <a href="http://www.flowgig.com">www.flowgig.com</a></i>