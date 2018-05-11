<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'date', 'venue', 'location', 'event', 'description', 'internal_info', 'confirmed', 'public'
    ];

    /**
     * Scope a query to only include upcoming gigs.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>', Carbon::now()->subDay(1));
    }

    /**
     * Scope a query to only include public gigs.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublic($query)
    {
        return $query->wherePublic(true);
    }

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
     * Get a gig title composed from the date and venue (if any) and/or location (if any)
     *
     * @return string
     */
    public function composedTitle()
    {
        if ($this->venue && $this->location)
            return $this->date() . ' - ' . $this->venue . ', ' . $this->location;

        if ($venueOrLocation = $this->venue ?? $this->location)
            return $this->date() . ' - ' . $venueOrLocation;

        return $this->date();
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
