<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBannerImage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "home_banner_image";
    protected $fillable = ['image_link', 'redirect_link'];
}
