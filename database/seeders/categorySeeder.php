<?php

namespace Database\Seeders;

use App\Models\product_category;
use App\Models\sub_category;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        product_category::factory()->count(5)->create()->each(function ($product_category){
            sub_category::factory()->count(rand(2,4))->create(['product_category_id'=>$product_category]);
        });
    }
}
