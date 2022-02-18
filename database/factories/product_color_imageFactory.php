<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Intervention\Image\Facades\Image;

class product_color_imageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $blankArray=[];
        for ($i=1; $i <= 5; $i++) {
            $imageLarge = $this->faker->image(storage_path('app/public/product/large/'), 800, 1000, null, false);
            $imageSmall = Image::make(storage_path('app/public/product/large/') . $imageLarge)->resize(400, 500);
            $imageSmall->save('storage/app/public/product/small/'.$imageLarge);
            array_push($blankArray, $imageLarge);
        }
        $image = implode(',', $blankArray);
        return [
//            'product_id'=>null,
            'product_color_id'=>rand(1,5),
            'stock'=>rand(1,6),
            'images'=>$image,
        ];
    }
}
