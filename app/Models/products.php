<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['product_category_id', 'sub_category_id'];

    public function details(){
        return $this->hasOne(product_details::class, 'product_id', 'id');
    }
    public function product_color_img(){
        return $this->hasOne(product_color_image::class, 'product_id', 'id');
    }
    public function product_all_img(){
        return $this->hasMany(product_color_image::class, 'product_id', 'id');
    }
    public function category(){
        return $this->hasOne(product_category::class, 'id', 'product_category_id');
    }

}
