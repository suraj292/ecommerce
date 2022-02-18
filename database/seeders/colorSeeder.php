<?php

namespace Database\Seeders;

use App\Models\select_product_color;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class colorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = faker::create();
//        select_product_color::insert([
//            'color_name' => $faker->name,
////            'color_image' => $this->faker->image('storage/color_image/', 100, 100, 'color'),
//            'color_image' => $faker->colorName,
//        ]);
        select_product_color::factory()->count(5)->create();
    }
}
