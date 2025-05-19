<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsIndexRequestData;
use App\Http\Resources\ProductsListResource;
use App\Models\Product;
use App\Services\ProductFilterService;

class ProductController extends Controller
{
    public function index(ProductsIndexRequestData $data, ProductFilterService $productFilterService)
    {
        return ProductsListResource::collection(
            $productFilterService->applyProperties(
                Product::with('propertyValues.property'),
                $data->properties
            )->paginate(40)
        );
    }
}
