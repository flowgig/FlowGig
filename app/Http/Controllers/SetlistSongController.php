<?php

namespace App\Http\Controllers;

use App\SetlistSong;
use Illuminate\Http\Request;

use App\Http\Requests;

class SetlistSongController extends Controller
{
    /**
     * Store a newly created SetlistSong in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SetlistSong::create($request->all());
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
