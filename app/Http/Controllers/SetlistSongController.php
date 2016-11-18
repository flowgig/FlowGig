<?php

namespace App\Http\Controllers;

use App\Setlist;
use App\SetlistSong;
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
     * @param Setlist $setlist
     * @return SetlistSong
     */
    public function store(Request $request, Setlist $setlist)
    {
        $this->authorize('createSetlistSongs', $setlist->gig->band);

        $setlistSong = new SetlistSong();

        $setlistSong->setlist()->associate($setlist);
        $setlistSong->fill($request->all());
        $setlistSong->fill($setlistSong->song->setlistDefaults());

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
        $this->authorize('delete', $setlistSong);

        $setlistSong->delete();
    }
}
