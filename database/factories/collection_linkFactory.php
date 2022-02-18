<?php

namespace Database\Factories;

use App\Models\products;
use Illuminate\Database\Eloquent\Factories\Factory;

class collection_linkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productId = products::all();
        return [
//            'collection_name_id'=>'',
            'product_id'=>$productId->random()->id,
        ];
    }
}
