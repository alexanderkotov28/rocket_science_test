<?php

namespace App\Http\Requests;

use Spatie\LaravelData\Data;

class ProductsIndexRequestData extends Data
{
    public function __construct(
        public array $properties = []
    )
    {
    }
}
