<ul>
@foreach($songs as $song)
    <li><a href="{{ route('song.show', $song) }}">show</a> <a href="{{ route('song.edit', $song) }}">edit</a> {{ $song->title }} </li>
@endforeach
</ul>