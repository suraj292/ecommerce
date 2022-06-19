<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    use HasFactory;
    protected $table = "wallet";
    protected $fillable = ['user_id', 'giftCard_id', 'amount'];
}
