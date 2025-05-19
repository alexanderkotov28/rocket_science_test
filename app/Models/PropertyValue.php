<?php

namespace App\Models;

use Database\Factories\PropertyValueFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyValue extends Model
{
    use HasFactory;

    protected static function newFactory(): PropertyValueFactory
    {
        return PropertyValueFactory::new();
    }

    public function property()
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_property_value');
    }
}
