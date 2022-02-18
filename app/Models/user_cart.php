<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user_cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "user_cart";
    public $timestamps = false;
    protected $fillable = ['user_id', 'product_id', 'product_color_id', 'title', 'price', 'offer_price', 'image', 'quantity'];

    public function productColor(){
        return $this->hasOne(select_product_color::class, 'id', 'product_color_id');
    }
}
