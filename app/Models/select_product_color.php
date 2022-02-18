<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class select_product_color extends Model
{
    use HasFactory;
    protected $table = 'select_product_color';
    public $timestamps = false;
    protected $fillable = ['color_name', 'color_image'];
}
