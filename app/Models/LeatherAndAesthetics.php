<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeatherAndAesthetics extends Model
{
    use HasFactory;
    protected $table ="leathers_and_aesthetics";
    protected $fillable = ['file', 'category', 'likes'];
}
