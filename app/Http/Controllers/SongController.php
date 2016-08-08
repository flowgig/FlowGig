<?php

namespace App\Http\Controllers;

use App\Band;
use App\Song;
use Illuminate\Http\Request;

use App\Http\Requests;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $bandId
     * @return \Illuminate\Http\Response
     */
    public function index($bandId)
    {
        $band = Band::with('songs')->find($bandId);

        return view('songs.index', ['band' => $band]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function create(Band $band)
    {
        return view('songs.create', ['band' => $band]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Band $band)
    {
        $this->validate($request, [
            'title' => 'required|max:80',
        ]);

        $song = new Song();
        $song->band()->associate($band);
        $song->fill($request->all());
        $song->save();

        // TODO: Flash song stored

        return redirect()->route('songs.index', $band);
    }

    /**
     * Display the specified resource.
     *
     * @param Song $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('songs.show', ['song' => $song]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Song $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        return view('songs.edit', ['song' => $song]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Song $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $this->validate($request, [
            'title' => 'required|max:80',
        ]);

        $song->update($request->all());

        // TODO: Flash song updated

        return redirect()->route('songs.index', $song->band);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Song $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();

        // TODO: Flash song deleted

        return redirect()->route('songs.index', $song->band);
    }
}
