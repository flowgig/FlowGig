<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('setlists.index', ['setlists' => Setlist::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setlists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:80',
        ]);
        
        Setlist::create($request->all());

        // TODO: Flash setlist stored

        return redirect()->route('setlists.index');
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

        $repertoire = Song::get(); // TODO: Scope to band
        return view('setlists.edit', ['setlist' => $setlist, 'repertoire' => $repertoire]);
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

        return redirect()->route('setlists.index');
    }
}
