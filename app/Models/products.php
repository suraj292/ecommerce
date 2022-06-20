<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['product_category_id', 'sub_category_id'];

    //  product detail
    public function details(){
        return $this->hasOne(product_details::class, 'product_id', 'id');
    }
    // first color of product
    public function product_color_img(){
        return $this->hasOne(product_color_image::class, 'product_id', 'id');
    }
    //  Select all Colors of product
    public function product_all_img(){
        return $this->hasMany(product_color_image::class, 'product_id', 'id');
    }
    //  get product category
    public function category(){
        return $this->hasOne(product_category::class, 'id', 'product_category_id');
    }
    //  get product sub_category
    public function sub_category()
    {
        return $this->hasOne(sub_category::class, 'id', 'sub_category_id');
    }

}
