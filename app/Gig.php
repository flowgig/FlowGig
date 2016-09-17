<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date', 'venue', 'location', 'confirmed'
    ];

    /**
     * Get the band for the gig.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }
}
