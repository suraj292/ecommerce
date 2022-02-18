<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_color_image extends Model
{
    use HasFactory;
    protected $table = "product_color_image";
    public $timestamps = false;
    protected $fillable = ['product_id', 'product_color_id', 'stock', 'images'];

    public function getColor()
    {
        return $this->hasOne(select_product_color::class, 'id', 'product_color_id');
    }
}
