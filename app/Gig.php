<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Excludes the system gig for the band on every normal gigs query
        static::addGlobalScope('omitSystemGig', function (Builder $builder) {
            $builder->where('name', '<>', '_system_');
        });
    }

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

    /**
     * Get the setlist for the gig if any.
     */
    public function setlist()
    {
        return $this->hasOne('App\Setlist');
    }
}
