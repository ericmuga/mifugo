<?php

namespace App\Http\Resources;

use App\Models\Medium;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [ 'title'=>$this->title,
                  'id'=>$this->id,
                  'type'=>$this->type,
                  'dimension'=>$this->dimension->name,
                  'animal'=>$this->animal->name,
                  'last_updated'=>$this->updated_at->diffForHumans(),
                  'media'=>$this->media()


               ];
    }
}
