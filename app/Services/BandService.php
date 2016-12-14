<?php

namespace App\Services;

use App\Band;
use App\Gig;
use App\Setlist;
use Illuminate\Support\Facades\Auth;

class BandService
{
    /**
     * Creates a new band with required related models
     *
     * @param $bandName
     * @return Band
     */
    public static function create($bandName)
    {
        $band = Band::create(['name' => $bandName]);

        $band->members()->attach(Auth::user());

        $hiddenSystemGig = new Gig(['name' => '_system_']);
        $band->gigs()->save($hiddenSystemGig);

        $defaultValuesSetlistSongs = new Setlist();
        $hiddenSystemGig->setlist()->save($defaultValuesSetlistSongs);

        return $band;
    }
}