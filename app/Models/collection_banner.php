<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collection_banner extends Model
{
    use HasFactory;
    protected $table = "collection_banner";
    public $timestamps = false;
    protected $fillable = ['banner_link','bg_color','image','offer','item'];
}
