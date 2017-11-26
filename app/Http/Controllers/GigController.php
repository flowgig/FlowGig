<?php

namespace App\Http\Controllers;

use App\Band;
use App\Gig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class GigController extends Controller
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
     * Display a listing of the resource.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function index($bandId)
    {
        $band = Band::with('gigs')->find($bandId);

        $this->authorize('view', $band);

        return view('gigs.index', ['band' => $band]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function create(Band $band)
    {
        $this->authorize('createGigs', $band);

        return view('gigs.create', ['band' => $band]);
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
        $this->authorize('createGigs', $band);

        $this->validate($request, [
            'name' => 'required|max:80',
            'venue' => 'required|max:80',
            'location' => 'required|max:80',
            'date' => 'nullable|date_format:Y-m-d',
        ]);

        $gig = new Gig();
        $gig->creator()->associate(Auth::user());
        $gig->band()->associate($band);
        $gig->fill($request->all());
        $gig->confirmed = $request->confirmed ? true : false;
        $gig->public = $request->public ? true : false;
        $gig->save();

        // TODO: Flash setlist stored

        return redirect()->route('gigs.index', $gig->band);
    }

    /**
     * Display the specified resource.
     *
     * @param Gig $gig
     * @return \Illuminate\Http\Response
     */
    public function show(Gig $gig)
    {
        $this->authorize('view', $gig);

        return view('gigs.show', ['gig' => $gig]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gig $gig
     * @return \Illuminate\Http\Response
     */
    public function edit(Gig $gig)
    {
        $this->authorize('update', $gig);

        return view('gigs.edit', ['gig' => $gig]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Gig $gig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gig $gig)
    {
        $this->authorize('update', $gig);

        $this->validate($request, [
            'name' => 'required|max:80',
            'venue' => 'required|max:80',
            'location' => 'required|max:80',
            'date' => 'nullable|date_format:Y-m-d',
        ]);

        $gig->fill($request->all());
        $gig->confirmed = $request->confirmed ? true : false;
        $gig->public = $request->public ? true : false;

        if ($gig->isDirty())
            $gig->updater()->associate(Auth::user());
        $gig->save();

        // TODO: Flash gig updated

        return redirect()->route('gigs.show', $gig);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gig $gig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gig $gig)
    {
        $this->authorize('delete', $gig);

        $gig->delete();

        // TODO: Flash gig deleted

        return redirect()->route('gigs.index', $gig->band);
    }
}
