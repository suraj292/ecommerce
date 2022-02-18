<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_details extends Model
{
    use HasFactory;
    protected $table = "product_details";
    public $timestamps = false;
    protected $fillable = ['product_id', 'title', 'dimension', 'description', 'care_instruction', 'gender', 'price', 'offer_price', 'return', 'sale', 'discount', 'italian', 'specification'];

    public function product()
    {
        return $this->belongsTo(products::class, 'product_id', 'id');
    }

    public function product_color_img()
    {
        return $this->hasOne(product_color_image::class, 'product_id', 'product_id');
    }
    public function product_all_img(){
        return $this->hasMany(product_color_image::class, 'product_id', 'product_id');
    }
}
