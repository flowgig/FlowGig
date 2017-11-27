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
        $this->middleware(['auth', 'isVerified']);
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

        $this->validate($request, [
            'song_id' => 'required|numeric|min:0',
            'number_in_list' => 'required|numeric|min:1',
        ]);

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

        $this->validate($request, [
            'setlist_id' => 'required|numeric|min:0',
            'song_id' => 'required|numeric|min:0',
            'number_in_list' => 'required|numeric|min:1',
            'key' => 'nullable|string|max:3',
            'bpm' => 'nullable|numeric|min:0',
            'duration' => 'nullable|numeric|min:0',
            'intensity' => 'nullable|numeric|min:0|max:10',
            'comment' => 'nullable|string|max:100',
        ]);

        $setlistSong->fill($request->all());
        if ($setlistSong->isDirty()) {
            $setlistSong->updater()->associate(Auth::user());
            $setlistSong->save(); // Only save if dirty to avoid always touching related models
            $setlist = $setlistSong->setlist;
            $setlist->updater()->associate(Auth::user());
            $setlist->save();
        }
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
