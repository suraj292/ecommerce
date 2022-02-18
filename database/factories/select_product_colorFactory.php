<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class select_product_colorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'color_name'=>$this->faker->colorName,
            'color_image'=>$this->faker->image(storage_path('app/public/color_image'), 100, 100, null, false),
        ];
    }
}
