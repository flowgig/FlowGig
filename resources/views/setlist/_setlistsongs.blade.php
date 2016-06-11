<h3>Songs:</h3>
<div id="setlistsongs">
    <!--  <ul class="list">
        @foreach($setlistSongs as $setlistSong)
            <li>{{ $setlistSong->number_in_list . " &#151; " . $setlistSong->song->title }} </li>
        @endforeach
            </ul> -->
    <ul class="list sortable-list" v-sortable="{animation: 150}">
        <li class="" v-for="setlistSong in setlistSongs">
            @{{ setlistSong.number_in_list }} &#151;
            @{{ setlistSong.song.title }}
            <small>(
                @{{ setlistSong.song.music_by }} /
                @{{ setlistSong.song.lyrics_by }}
                )
            </small>
        </li>
    </ul>
</div>


