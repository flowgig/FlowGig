<?php

namespace App\Services;

use App\Band;
use App\Gig;
use App\Setlist;

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

        $hiddenSystemGig = new Gig(['name' => '_system_']);
        $band->gigs()->save($hiddenSystemGig);

        $defaultValuesSetlistSongs = new Setlist();
        $hiddenSystemGig->setlist()->save($defaultValuesSetlistSongs);

        return $band;
    }
}