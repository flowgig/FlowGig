<ul>
@foreach($songs as $song)
    <li>{{ $song->title }}</li>
@endforeach
</ul>