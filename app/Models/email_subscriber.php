<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class email_subscriber extends Model
{
    use HasFactory;
    protected $table = "email_subscriber";
    protected $fillable = ['email'];
}
