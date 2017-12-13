<?php

namespace App\Http\Controllers;

use App\Link;
use App\Services\LinkService;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongLinkController extends Controller
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
     * Show the form for creating a new song link.
     *
     * @param Song $song
     * @return \Illuminate\Http\Response
     */
    public function create(Song $song)
    {
        $this->authorize('createSongLinks', $song);

        return view('song-links.create', ['song' => $song]);
    }

    /**
     * Store a newly created song link in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Song $song
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Song $song)
    {
        $this->authorize('createSongLinks', $song);

        $this->validate($request, [
            'url' => 'required|active_url',
            'text' => 'max:80',
            'type' => 'max:80'
        ]);

        LinkService::create($request->all(), $song, Auth::user());

        // TODO: Flash link stored

        return redirect()->route('songs.show', $song);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Link $songLink
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $songLink)
    {
        $this->authorize('update', $songLink);

        return view('song-links.edit', ['songLink' => $songLink]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Link $songLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $songLink)
    {
        $this->authorize('update', $songLink);

        $this->validate($request, [
            'url' => 'required|active_url',
            'text' => 'max:80',
            'type' => 'max:80'
        ]);

        $songLink->fill($request->all());
        if ($songLink->isDirty())
            $songLink->updater()->associate(Auth::user());
        $songLink->save();

        // TODO: Flash link updated

        $song = $songLink->linkable;

        return redirect()->route('songs.show', $song);
    }

    /**
     * Remove the link from storage.
     *
     * @param Link $songLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $songLink)
    {
        $this->authorize('delete', $songLink);

        $songLink->delete();

        // TODO: Flash link deleted

        $song = $songLink->linkable;

        return redirect()->route('songs.show', $song);
    }
}
