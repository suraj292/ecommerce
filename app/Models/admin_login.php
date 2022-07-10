<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

class admin_login extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = "admin_login";
    public $timestamps = false;
    protected $fillable = ['user', 'password', 'key'];
}
