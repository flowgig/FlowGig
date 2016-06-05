<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetlistSong extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number_in_list', 'setnumber', 'key', 'energy', 'duration', 'comment'
    ];
}
