<?php

namespace App\Http\Controllers;

use App\Band;
use App\Invitation;
use App\Services\InvitationService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BandInvitationController extends Controller
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
     * Show the form for creating a new band invitation.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function create(Band $band)
    {
        $this->authorize('inviteMembers', $band);

        // Provide all users except those already members in the band:
        $bandMembersIds = $band->memberships->pluck('user_id')->toArray();
        $users = User::whereNotIn('id', $bandMembersIds)->get();

        return view('band-memberships.invite', ['band' => $band, 'users' => $users]);
    }

    /**
     * Store a newly created band invitation in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Band $band)
    {
        $this->authorize('inviteMembers', $band);

        $this->validate($request, [
            'invitee_email' => 'required|string|email|max:80',
            'message' => 'nullable|string|max:140'
        ]);

        InvitationService::create($request->all(), $band, Auth::user());

        // TODO: Flash invitation made

        return redirect()->route('band-memberships.index', $band);
    }

    /**
     * Accept the band invitation
     *
     * @param Invitation $bandInvitation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Invitation $bandInvitation)
    {
        $this->authorize('accept', $bandInvitation);

        $band = $bandInvitation->invitational;
        $invitedUser = $bandInvitation->invitee;

        if ($bandInvitation->isPending())
        {
            if(!$band->hasMember($invitedUser))
                $band->members()->attach($invitedUser, ['created_by' => $bandInvitation->created_by]);

            InvitationService::setAccepted($bandInvitation); // TODO: Flash invitation accepted
        }

        return redirect()->back();
    }

    /**
     * Decline the band invitation
     *
     * @param Invitation $bandInvitation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function decline(Invitation $bandInvitation)
    {
        $this->authorize('decline', $bandInvitation);

        if ($bandInvitation->isPending())
            InvitationService::setDeclined($bandInvitation); // TODO: Flash invitation declined

        return redirect()->back();
    }

    /**
     * Set the band invitation expired.
     *
     * @param Invitation $bandInvitation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setExpired(Invitation $bandInvitation)
    {
        $this->authorize('setExpired', $bandInvitation);

        if ($bandInvitation->isPending())
            InvitationService::setExpired($bandInvitation); // TODO: Flash invitation set expired

        return redirect()->back();
    }
}
