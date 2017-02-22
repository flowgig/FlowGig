<?php

namespace App\Http\Controllers;

use App\Band;
use App\BandMembership;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BandMembershipController extends Controller
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
        $band = Band::with('members')->find($bandId);

        $this->authorize('view', $band);

        return view('band-memberships.index', ['band' => $band]);
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
        $this->authorize('addMembers', $band);

        $bandMembership = new BandMembership();
        $bandMembership->creator()->associate(Auth::user());
        $bandMembership->band()->associate($band);
        $bandMembership->fill($request->all());
        $bandMembership->save();

        // TODO: Flash band membership created

        return redirect()->route('band-memberships.index', $band);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param BandMembership $bandMembership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BandMembership $bandMembership)
    {
        $this->authorize('update', $bandMembership);

        $bandMembership->fill($request->all());
        if ($bandMembership->isDirty())
            $bandMembership->updater()->associate(Auth::user());
        $bandMembership->save();

        // TODO: Flash band membership updated

        return redirect()->route('band-memberships.index', $bandMembership->band);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BandMembership $bandMembership
     * @return \Illuminate\Http\Response
     */
    public function destroy(BandMembership $bandMembership)
    {
        $this->authorize('delete', $bandMembership);

        $bandMembership->updater()->associate(Auth::user());
        $bandMembership->save();
        $bandMembership->delete();

        // TODO: Flash band membership deleted

        return redirect()->route('band-memberships.index', $bandMembership->band);
    }
}
