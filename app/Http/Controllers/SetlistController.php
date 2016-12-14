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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Gig $gig
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Gig $gig)
    {
        $this->authorize('createSetlists', $gig->band);

        $newSetlist = $gig->setlist()->create([]);

        $sourceGigId = $request->input('sourceGigId');
        if($sourceGigId != "new") // TODO: Improve check
        {
            $sourceSetlist = $gig->band->gigs->find($sourceGigId)->setlist;

            $replicatedSetlistSongs = array();
            foreach ($sourceSetlist->setlistSongs as $sourceSetlistSong)
            {
                $replicatedSetlistSong = $sourceSetlistSong->replicate(['setlist_id']);
                $replicatedSetlistSong->setlist()->associate($newSetlist);
                $replicatedSetlistSongs[] = $replicatedSetlistSong;
            }

            $newSetlist->setlistSongs()->saveMany($replicatedSetlistSongs);
        }
        return redirect()->route('setlists.edit', ['setlist' => $newSetlist]);
    }

    /**
     * Display the specified resource.
     *
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     */
    public function show(Setlist $setlist)
    {
        $this->authorize('view', $setlist);

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
        $this->authorize('update', $setlist);

        $setlist->setlistSongs->load(['song' => function($query){
            $query->withTrashed();
        }]);

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
        $this->authorize('update', $setlist);

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
        $this->authorize('export', $setlist);

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
        $this->authorize('delete', $setlist);

        $setlist->delete();

        // TODO: Flash setlist deleted

        return redirect()->route('gigs.index', $setlist->gig->band);
    }
}
