Repertoire:
<ul>
    @foreach($repertoire as $song)
        <li> {{ $song->title }} </li>
    @endforeach
</ul>