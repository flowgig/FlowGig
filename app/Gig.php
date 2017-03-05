<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date', 'venue', 'location', 'status'
    ];

    /**
     * Get the formatted date for the gig if any
     *
     * @return mixed
     */
    public function date()
    {
        return $this->date ? $this->date->toDateString() : "";
    }

    /**
     * Get the creator of the gig
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the updater of the gig
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    /**
     * Get the band for the gig.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }

    /**
     * Get the setlist for the gig if any.
     */
    public function setlist()
    {
        return $this->hasOne('App\Setlist');
    }
}
