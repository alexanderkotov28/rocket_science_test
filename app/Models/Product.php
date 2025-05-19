<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => 'float',
    ];

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    public function propertyValues()
    {
        return $this->belongsToMany(PropertyValue::class, 'product_property_values');
    }

    public function properties()
    {
        return $this->propertyValues
            ->map(fn($value) => $value->property)
            ->unique('id')
            ->values();
    }
}
