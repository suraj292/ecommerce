<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collection_link extends Model
{
    use HasFactory;
    protected $table = "collection_link";
    public $timestamps = false;
    protected $fillable = ['collection_name_id', 'product_id'];

//    public function collectionName(){
//        return $this->belongsTo(collection_name::class, 'collection_name_id', 'id');
//    }
    public function products()
    {
        return $this->hasOne(product_details::class, 'product_id', 'product_id');
    }
}
