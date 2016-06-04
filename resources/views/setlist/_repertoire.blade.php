Repertoire:
<ul class="list">
    @foreach($repertoire as $song)
        <li> {{ $song->title }} </li>
    @endforeach
</ul>