<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BandMembership extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the user having the membership.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the band the membership is in.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }
}
