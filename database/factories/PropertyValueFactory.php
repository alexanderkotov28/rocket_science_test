<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\PropertyValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyValueFactory extends Factory
{

    protected $model = PropertyValue::class;

    public function definition()
    {
        return [
            'property_id' => Property::factory(),
            'value' => $this->faker->word(),
        ];
    }
}
