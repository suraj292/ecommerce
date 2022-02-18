<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_verification extends Model
{
    use HasFactory;
    protected $table = "user_verification";
    protected $fillable = ['user_id', 'email_verification_link', 'mobile_otp'];
}
