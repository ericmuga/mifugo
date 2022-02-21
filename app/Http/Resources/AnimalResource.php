<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {


   //protected $fillable= ['name','description','species','url'];
        return[
                'name'=>$this->name,
                'description'=>$this->description,
                'species'=>$this->species,
                'url'=>$this->url,
                'id'=>$this->id,
                'posts_count'=>$this->posts_count
              ];
    }
}