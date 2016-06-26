<?php

namespace App\Http\Controllers;

use App\Setlist;
use App\SetlistSong;
use App\Song;
use Illuminate\Http\Request;

use App\Http\Requests;

class SetlistSongController extends Controller
{
    /**
     * Store a newly created SetlistSong in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Setlist $setlist
     * @param Song $song
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Setlist $setlist, Song $song)
    {
        $this->validate($request, [
            'number_in_list' => 'required',
        ]);

        $setlistSong = new SetlistSong();

        $setlistSong->setlist()->associate($setlist);

        $setlistSong->song()->associate($song);

        $setlistSong->fill($request->all());

        $setlistSong->save();
    }

    /**
     * Update the specified SetlistSong in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param SetlistSong $setlistSong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetlistSong $setlistSong)
    {
        $setlistSong->update($request->all());
    }

    /**
     * Remove the specified SetlistSong from storage.
     *
     * @param SetlistSong $setlistSong
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetlistSong $setlistSong)
    {
        $setlistSong->delete();
    }
}
