<?php

namespace App\Http\Controllers;

use App\Setlist;
use App\SetlistSong;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
     * @param Setlist $setlist
     * @return SetlistSong
     */
    public function store(Request $request, Setlist $setlist)
    {
        $this->authorize('createSetlistSongs', $setlist->gig->band);

        $setlistSong = new SetlistSong();
        $setlistSong->creator()->associate(Auth::user());
        $setlistSong->setlist()->associate($setlist);
        $setlistSong->fill($request->all());
        // Song associated by id in request
        $song = $setlistSong->song;
        $setlistSong->fill([
            'key' => $song->key,
            'bpm' => $song->bpm,
            'duration' => $song->duration,
            'intensity' => $song->intensity
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
        $this->authorize('update', $setlistSong);

        $setlistSong->fill($request->all());
        if ($setlistSong->isDirty())
            $setlistSong->updater()->associate(Auth::user());
        $setlistSong->save();
    }

    /**
     * Remove the specified SetlistSong from storage.
     *
     * @param SetlistSong $setlistSong
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetlistSong $setlistSong)
    {
        $this->authorize('delete', $setlistSong);

        $setlistSong->delete();
    }
}
