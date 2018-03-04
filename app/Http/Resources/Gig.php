<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Gig extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'date' => $this->date->toDateTimeString(),
            'venue' => $this->venue,
            'location' => $this->location,
            'description' => $this->description,
            'confirmed' => (bool) $this->confirmed,
        ];
    }
}
