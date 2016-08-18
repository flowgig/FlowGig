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
     * @return SetlistSong;
     */
    public function store(Request $request)
    {
        $setlistSong = new SetlistSong();

        $setlistSong->fill($request->all());

        // Add any defined default field values:
        $defaultSetlist = Setlist::where('title', 'Default')->with('setlistSongs')->first(); // TODO: Prevent multiple setlists named Default
        if($defaultSetlistSong = $defaultSetlist->setlistSongs->where('song_id', $request->input('song_id'))->first())
            $setlistSong->fill([
                'key' => $defaultSetlistSong->key,
                'bpm' => $defaultSetlistSong->bpm,
                'duration' => $defaultSetlistSong->duration,
                'intensity' => $defaultSetlistSong->intensity,
                'comment' => $defaultSetlistSong->comment
            ]);

        $setlistSong->save();

        return $setlistSong;
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
