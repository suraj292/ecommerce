<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_address extends Model
{
    use HasFactory;
    protected $table = "user_address";
    public $timestamps = false;
    protected $fillable = ['user_id', 'name', 'phone', 'pincode', 'locality', 'address', 'city', 'state', 'landmark', 'alternate_phone', 'default'];
}
