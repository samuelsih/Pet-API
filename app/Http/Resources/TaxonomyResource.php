<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxonomyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'kingdom' => $this->kingdom,
            'class' => $this->class,
            'family' => $this->family,
            'genus' => $this->genus,
            'species' => $this->species,
        ];
    }
}
