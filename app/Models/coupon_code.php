<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon_code extends Model
{
    use HasFactory;
    protected $table = "coupon_code";
    protected $fillable = ['code', 'value', 'max_amount', 'active', 'expire_at'];
    protected $dates = ['expire_at'];
}
