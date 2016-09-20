<?php

namespace App\Http\Controllers;

use App\Gig;
use App\Setlist;
use Illuminate\Http\Request;
use PDF;

use App\Http\Requests;

class SetlistController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Gig $gig
     * @return \Illuminate\Http\Response
     */
    public function store(Gig $gig)
    {
        $newSetlist = $gig->setlist()->create([]);

        return redirect()->route('setlist.edit', ['setlist' => $newSetlist]);
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
        $setlist->update($request->all());

        return redirect()->route('gigs.index', $setlist->gig->band);
    }

    /**
     * Export the setlist to file.
     *
     * @param Request $request
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Setlist $setlist)
    {
        $pdf = PDF::loadView('setlists.exportlayout', ['request' => $request, 'setlist' => $setlist]);

        return $pdf->stream($setlist->title . '.pdf');
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

        return redirect()->route('gigs.index', $setlist->gig->band);
    }
}
