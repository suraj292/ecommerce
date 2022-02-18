<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $table = "slider";
    public $timestamps = false;
    protected $fillable = ['image', 'h4', 'h1', 'button_link', 'button_name'];
}
