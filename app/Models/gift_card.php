<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gift_card extends Model
{
    use HasFactory;
    protected $table = "gift_card";
    protected $fillable = ['user_id', 'amount', 'code', 'expiry'];
}
