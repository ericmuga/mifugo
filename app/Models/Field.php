<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable=['name','description'];

     public function setNameAttribute($value)
    {
        $this->attributes['name'] =strtoupper($value);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
