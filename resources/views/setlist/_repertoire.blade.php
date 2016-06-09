<div class="modal-header">Repertoire:</div>
<div class="modal-content">
    <ul class="list list-clickable">
        <li v-on:click="addSong(song)" v-for="song in repertoire">
            @{{ song.title }}
            <small>
                (
                @{{ song.music_by }} /
                @{{ song.lyrics_by }}
                )
            </small>
        </li>
    </ul>
</div>
