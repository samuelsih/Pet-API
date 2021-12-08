<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
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
            'name' => $this->name,
            'gender' => $this->gender,
            'weight' => $this->weight . ' kg',
            'description' => $this->description,
            'status' => $this->status,
            'taxonomy' => new TaxonomyResource($this->taxonomy),
        ];
    }
}
