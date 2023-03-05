<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected function upperUsername(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => strtoupper($attributes['username']),
        );
    }
}
