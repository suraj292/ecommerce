<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    use HasFactory;
    protected $table = "product_category";
    public $timestamps = false;
    protected $fillable = ['product_category', 'hsn'];

    protected function sub_category(){
        return $this->hasMany(sub_category::class, 'product_category_id', 'id');
    }
}
