<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyValue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testHttpAccess(): void
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
        $response->assertJson(fn(AssertableJson $json) => $json->hasAll(['data', 'meta', 'links'])->has('data', 0));
    }

    public function testProductFilter()
    {
        $product = Product::factory()
            ->has(PropertyValue::factory()->count(2))
            ->create();

        $query = [];

        foreach ($product->propertyValues as $propertyValue) {
            $query[$propertyValue->property->name] = $propertyValue->value;
        }

        $response = $this->get('/api/products?' . http_build_query($query));

        $response->assertJson(fn(AssertableJson $json) => $json->hasAll(['data', 'meta', 'links'])
            ->has('data', 1)
            ->has('data.0', fn(AssertableJson $json) => $json->where('id', $product->id)
                ->where('name', $product->name)
                ->where('price', $product->price)
                ->where('quantity', $product->quantity)->etc()
            )
        );
    }
}
