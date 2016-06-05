<h3>Songs:</h3>
<ul class="list">
    @foreach($setlistSongs as $setlistSong)
        <li>{{ $setlistSong->number_in_list . " &#151; " . $setlistSong->song->title }} </li>
    @endforeach
</ul>