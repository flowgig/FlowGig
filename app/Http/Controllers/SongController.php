<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;

use App\Http\Requests;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('songs.index', ['songs' => Song::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:80',
        ]);
        
        Song::create($request->all());

        // TODO: Flash song stored

        return redirect()->route('songs.index');
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

        return redirect()->route('songs.index');
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

        return redirect()->route('songs.index');
    }
}
