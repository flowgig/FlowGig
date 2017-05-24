<?php

namespace App\Http\Controllers;

use App\Band;
use App\BandMembership;
use App\Http\Requests;
use App\User;
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
        $this->middleware(['auth', 'isVerified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $bandId
     * @return \Illuminate\Http\Response
     */
    public function index($bandId)
    {
        $band = Band::with('memberships.user')->find($bandId);

        $this->authorize('view', $band);

        return view('band-memberships.index', ['band' => $band]);
    }

    /**
     * Show the form for creating a new band membership.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function create(Band $band)
    {
        $this->authorize('addMembers', $band);

        // Provide all users except those already members in the band:
        $bandMembersIds = $band->memberships->pluck('user_id')->toArray();
        $users = User::whereNotIn('id', $bandMembersIds)->get();

        return view('band-memberships.create', ['band' => $band, 'users' => $users]);
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
        $bandMembership->user()->associate($request->input('user_id'));
        $bandMembership->save();

        // TODO: Flash band membership created

        return redirect()->route('band-memberships.index', $band);
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
