<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class sub_categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'product_category_id'=>rand(1,9),
            'sub_category'=>$this->faker->lexify('Sub_Category ???'),
        ];
    }
}
