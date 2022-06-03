<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

   protected $fillable= ['name','description','species','url'];

   public function posts()
   {
       return $this->belongsToMany(Post::class);
   }

   public function dimensions()
   {
       return $this->belongsToMany(Dimension::class);
   }

//    public function posts()
//    {
//        return $this->hasManyThrough(Post::class,Dimension::class);
//    }


}
