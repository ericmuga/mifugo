<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DimensionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ['name'=>$this->name,
                 'description'=>$this->description,
                'id'=>$this->id,
                'animals_count'=>$this->animals_count
            ];
    }
}
