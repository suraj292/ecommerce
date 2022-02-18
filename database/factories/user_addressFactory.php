<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\en_IN\Address;

class user_addressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'user_id'=>null,
            'name'=>$this->faker->name,
            'phone'=>$this->faker->phoneNumber,
            'pincode'=>rand(100000,699999),
            'locality'=>$this->faker->lexify('locality ?????'),
            'address'=>$this->faker->address,
            'city'=>$this->faker->city,
            'state'=>Address::state(),
            'landmark'=>$this->faker->boolean(50) ? null : $this->faker->lexify('landmark ????'),
            'alternate_phone'=>$this->faker->boolean(50) ? null : $this->faker->phoneNumber,
        ];
    }
}
