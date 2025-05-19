<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'properties' => $this->whenLoaded('propertyValues', function (Collection $propertyValues){
                return $propertyValues->map(fn($propertyValue) => [$propertyValue->property->name => $propertyValue->value]);
            })
        ];
    }
}
