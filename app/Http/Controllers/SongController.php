<?php

namespace App\Http\Controllers;

use App\Band;
use App\Services\SongService;
use App\Song;
use Illuminate\Http\Request;

use App\Http\Requests;

class SongController extends Controller
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
     * Display a listing of the resource.
     *
     * @param $bandId
     * @return \Illuminate\Http\Response
     */
    public function index($bandId)
    {
        $band = Band::with('songs')->find($bandId);

        $this->authorize('view', $band);

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
        $this->authorize('createSongs', $band);

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
        $this->authorize('createSongs', $band);

        $this->validate($request, [
            'title' => 'required|max:80',
        ]);

        SongService::create($request->all(), $band);

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
        $this->authorize('view', $song);

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
        $this->authorize('update', $song);

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
        $this->authorize('update', $song);

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
        $this->authorize('delete', $song);

        $song->delete();

        // TODO: Flash song deleted

        return redirect()->route('songs.index', $song->band);
    }
}
