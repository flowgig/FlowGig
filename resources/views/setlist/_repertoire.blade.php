<h3>Repertoire:</h3>
<ul class="list">
    @foreach($repertoire as $song)
        <li> {{ $song->title }} </li>
    @endforeach
</ul>