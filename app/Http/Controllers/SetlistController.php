<?php

namespace App\Http\Controllers;

use App\Band;
use App\Setlist;
use App\Song;
use Illuminate\Http\Request;
use PDF;

use App\Http\Requests;

class SetlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $bandId
     * @return \Illuminate\Http\Response
     */
    public function index($bandId)
    {
        $band = Band::with('setlists')->find($bandId);

        return view('setlists.index', ['band' => $band]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function create(Band $band)
    {
        return view('setlists.create', ['band' => $band]);
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
        
        $setlist = new Setlist();
        $setlist->band()->associate($band);
        $setlist->fill($request->all());
        $setlist->save();

        // TODO: Flash setlist stored

        return redirect()->route('setlists.index', ['band' => $band]);
    }

    /**
     * Display the specified resource.
     *
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     */
    public function show(Setlist $setlist)
    {
        return view('setlists.show', ['setlist' => $setlist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Setlist $setlist)
    {
        $setlist->setlistSongs->load('song');

        return view('setlists.edit', ['setlist' => $setlist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setlist $setlist)
    {
        //
    }

    /**
     * Export the setlist to file.
     *
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     */
    public function exportPreview(Setlist $setlist)
    {
        return view('setlists.exportlayout', ['setlist' => $setlist]);
    }

    /**
     * Export the setlist to file.
     *
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     */
    public function export(Setlist $setlist)
    {
        $pdf = PDF::loadView('setlists.exportlayout', ['setlist' => $setlist]);

        return $pdf->stream($setlist->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setlist $setlist)
    {
        $setlist->delete();

        // TODO: Flash setlist deleted

        return redirect()->route('setlists.index', $setlist->band);
    }
}
