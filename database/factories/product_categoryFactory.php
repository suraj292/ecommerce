<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class product_categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hsn'=>rand(1000,9999),
            'product_category'=>$this->faker->lexify('Category ???'),
        ];
    }
}
