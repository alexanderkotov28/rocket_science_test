<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

class ProductFilterService
{
    public function applyProperties(Builder $productBuilder, array $properties): Builder
    {
        return $productBuilder->whereHas('propertyValues', function (Builder $query) use ($properties) {
            foreach ($properties as $property => $values) {
                $query->whereIn('value', $values);
                $query->whereHas('property', function (Builder $query) use ($property) {
                    $query->where('name', $property);
                });
            }
        });
    }
}
