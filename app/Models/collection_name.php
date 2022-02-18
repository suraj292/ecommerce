<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collection_name extends Model
{
    use HasFactory;
    protected $table = "collection_name";
    public $timestamps = false;
    protected $fillable = ['name'];

    public function collectionLink(){
        return $this->hasMany(collection_link::class, 'collection_name_id', 'id');
    }

}
