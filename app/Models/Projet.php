<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;


    protected function upperLibele(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => strtoupper($attributes['libele']),
        );
    }

    public function accesses(){
        return $this->hasMany(Access::class);
    }
}
