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
        // Eager-load band members (newest first) and invitations:
        $band = Band::with([
            'memberships' => function ($query) {
                $query->latest();
            },
            'memberships.user',
            'invitations',
            'invitations.invitee'
        ])->find($bandId);

        $this->authorize('view', $band);

        return view('band-memberships.index', ['band' => $band]);
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
