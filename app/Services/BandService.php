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
        $band->members()->attach($creator, ['created_by' => $creator->id]);

        return $band;
    }

    /**
     * Deletes the band and all associated invitations
     *
     * @param Band $band
     * @throws \Exception
     */
    public static function delete(Band $band)
    {
        $band->invitations()->delete();

        $band->delete();
    }
}
