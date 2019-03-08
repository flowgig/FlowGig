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
            'date' => $this->date->format("Y-m-d\TH:i:s"), // DateTimeLocalString
            'venue' => $this->venue,
            'location' => $this->location,
            'event' => $this->event,
            'description' => $this->description,
            'confirmed' => (bool) $this->confirmed,
        ];
    }
}
