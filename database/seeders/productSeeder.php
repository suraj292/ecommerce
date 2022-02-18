<?php

namespace Database\Seeders;

use App\Models\product_category;
use App\Models\product_color_image;
use App\Models\product_details;
use App\Models\products;
use App\Models\sub_category;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        product_category::factory()->count(rand(3,5))->create()->each(function ($product_category){
//            sub_category::factory()->count(rand(1,4))->create(['product_category_id'=>$product_category->id])->each(function ($sub_category) use ($product_category) {
//                products::factory()->count(rand(9,35))->create(['product_category_id'=>$product_category->id, 'sub_category_id'=>$sub_category->id])->each(function ($products){
//                    product_details::factory()->create(['product_id'=>$products->id]);
//                    product_color_image::factory(rand(1,2))->create(['product_id'=>$products->id]);
//                });
//            });
//        });

        $sub_category = sub_category::all();
        foreach ($sub_category as $subCategory){
            products::factory()->count(rand(10,35))->create(['product_category_id'=>$subCategory->product_category_id, 'sub_category_id'=>$subCategory->id])
                ->each(function ($products){
                    product_details::factory()->create(['product_id'=>$products->id]);
                    product_color_image::factory(rand(1,2))->create(['product_id'=>$products->id]);
                });
        }

//        products::factory(100)->create(['product_category_id'=>1, 'sub_category_id'=>1]);
    }
}
