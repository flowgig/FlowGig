<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Band' => 'App\Policies\BandPolicy',
        'App\BandMembership' => 'App\Policies\BandMembershipPolicy',
        'App\Song' => 'App\Policies\SongPolicy',
        'App\Gig' => 'App\Policies\GigPolicy',
        'App\Setlist' => 'App\Policies\SetlistPolicy',
        'App\SetlistSong' => 'App\Policies\SetlistSongPolicy',
        'App\Invitation' => 'App\Policies\InvitationPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
