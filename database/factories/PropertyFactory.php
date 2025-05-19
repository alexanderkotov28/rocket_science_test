<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{

    protected $model = Property::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
