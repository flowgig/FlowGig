<h3>Songs:</h3>
<div>
    <!--  <ul class="list">
        @foreach($setlistSongs as $setlistSong)
            <li>{{ $setlistSong->number_in_list . " &#151; " . $setlistSong->song->title }} </li>
        @endforeach
            </ul> -->

    <ul id="setlistsongs" class="list sortable-list" v-sortable="{animation: 150}">
        <li data-number-in-list="@{{setlistSong.number_in_list}}" v-bind:data-number-in-list="setlistSong.number_in_list"  v-on:drop="updateNumber(setlistSong)" v-for="setlistSong in setlistSongs">
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


