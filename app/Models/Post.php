<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;


    protected $fillable=['title','type','body','footer','user_id'];
    public function post()
    {
        return $this->belongsToMany(Animal::class);
    }

    public function media()
    {
        return $this->belongsToMany(Medium::class);
    }

   public function author()
   {
       return $this->user();
   }
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function animals()
   {
       return $this->belongsToMany(Animal::class);
   }

   public function dimension()
   {
       return $this->belongsTo(Dimension::class);
   }
}
