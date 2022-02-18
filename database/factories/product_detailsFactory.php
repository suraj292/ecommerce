<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Base;

class product_detailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->numberBetween(800, 5000);
        return [
            'title'=>$this->faker->lexify('product ????? title ?????'),
            'dimension'=>rand(5,10).'" '.rand(5,10).'"',
            'description'=>$this->faker->text(25),
            'care_instruction'=>$this->faker->text(20),
            'specification'=>$this->faker->text(20),
            'price'=>$price,
            'offer_price'=> $this->faker->boolean(50) ? null : $price - 500,
            'gender'=>$this->faker->randomElement(['common', 'male', 'female']),
            'return'=>null,
            'sale'=>$this->faker->boolean(),
            'discount'=>$this->faker->boolean(),
            'italian'=>$this->faker->boolean(),
        ];
    }
}
