<?php

namespace App\Http\Controllers;

use App\Gig;
use App\Setlist;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware(['auth', 'isVerified']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Gig $gig
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Gig $gig)
    {
        $this->authorize('createSetlists', $gig->band);

        $newSetlist = new Setlist();
        $newSetlist->creator()->associate(Auth::user());
        $newSetlist->gig()->associate($gig);
        $newSetlist->save();

        $sourceGigId = $request->input('sourceGigId');
        if($sourceGigId != null)
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

        // TODO: Flash setlist created

        return redirect()->route('setlists.show', $newSetlist);
    }

    /**
     * Display the specified resource.
     *
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Setlist $setlist)
    {
        $this->authorize('view', $setlist);

        $setlist->setlistSongs->load(['song' => function($query){
            $query->withTrashed();
        }]);

        return view('setlists.show', ['setlist' => $setlist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
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
     * Export the setlist to file.
     *
     * @param Request $request
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function export(Request $request, Setlist $setlist)
    {
        $this->authorize('export', $setlist);

        $pdf = PDF::loadView('setlists.exportlayout', ['request' => $request, 'setlist' => $setlist]);

        $fileName = $this->makeSetlistPdfFileName($setlist);

        if($request->input('create-pdf') == 'stream')
            return $pdf->stream($fileName);

        return $pdf->download($fileName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setlist $setlist
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Setlist $setlist)
    {
        $this->authorize('delete', $setlist);

        $setlist->delete();

        // TODO: Flash setlist deleted

        return redirect()->route('gigs.show', $setlist->gig);
    }

    /**
     * @param Setlist $setlist
     * @return string
     */
    private function makeSetlistPdfFileName(Setlist $setlist): string
    {
        $toReplace = [' - ', ', ', ' '];

        $gigName =  strtolower(str_replace($toReplace, '_', $setlist->gig->composedTitle()));
        $bandName = strtolower(str_replace($toReplace, '_', $setlist->gig->band->name));

        return 'setlist_' . $bandName . '_' . $gigName . '.pdf';
    }
}
