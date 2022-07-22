<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home_video_banner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "home_video_banner";
    protected $fillable = ['video', 'heading', 'para', 'button_name', 'button_link'];
}
