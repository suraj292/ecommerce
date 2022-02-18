<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_profile extends Model
{
    use HasFactory;
    protected $table = "admin_profile";
    public $timestamps = false;
    protected $fillable = ['name', 'address', 'gstin', 'mobile', 'email'];
}
