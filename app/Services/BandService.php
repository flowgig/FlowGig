<?php

namespace App\Services;

use App\Band;
use Illuminate\Support\Facades\Auth;

class BandService
{
    /**
     * Creates a new band and makes the creator a member
     *
     * @param $bandName
     * @return Band
     */
    public static function create($bandName)
    {
        $band = Band::create(['name' => $bandName]);

        $band->members()->attach(Auth::user());

        return $band;
    }
}
