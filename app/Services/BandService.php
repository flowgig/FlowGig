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
     * @param $creator
     * @return Band
     */
    public static function create($bandName, $creator)
    {
        $band = new Band(['name' => $bandName]);
        $band->creator()->associate($creator);
        $band->save();
        $band->members()->attach($creator);


        return $band;
    }
}
