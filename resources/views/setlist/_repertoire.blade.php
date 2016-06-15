<div class="modal-header" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">Repertoire:</div>
<div class="modal-content">
    <ul class="list list-clickable">
        <li v-on:click="addSong(song)" v-for="song in repertoire" class="tooltip" title="Add @{{ song.title }} to setlist">
            @{{ song.id }} :
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
