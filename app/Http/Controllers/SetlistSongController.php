<?php

namespace App\Http\Controllers;

use App\Gig;
use App\Setlist;
use App\SetlistSong;
use App\Song;
use Illuminate\Http\Request;

use App\Http\Requests;

class SetlistSongController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created SetlistSong in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $bandId
     * @return SetlistSong
     */
    public function store(Request $request)
    {
        $setlistSong = new SetlistSong();

        $setlistSong->fill($request->all());

        $song = Song::find($request->input('song_id'));

        if($defaultSetlistSong = $song->defaultSetlistSong())
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
