<h3>Songs:</h3>
<div id="setlistsongs">
    <ul class="list">

        @foreach($setlistSongs as $setlistSong)
            <li>{{ $setlistSong->number_in_list . " &#151; " . $setlistSong->song->title }} </li>
        @endforeach
    </ul>

    <ul class="list list-group" v-sortable="{ handle: '.handle' }">
        <li class="list-group-item" v-for="setlistSong in setlistSongs">
            <i class="handle"></i>
            @{{ setlistSong.number_in_list }} &#151;
            @{{ setlistSong.song.title }}
        </li>
    </ul>
</div>

<script>
        new Vue({
            el: '#setlistsongs',
            data: {
                setlistSongs: {!!  $setlistSongs !!}
            }
        });
</script>