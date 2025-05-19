<?php

namespace App\Models;

use Database\Factories\PropertyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected static function newFactory(): PropertyFactory
    {
        return PropertyFactory::new();
    }

    public function values()
    {
        return $this->hasMany(PropertyValue::class);
    }
}
