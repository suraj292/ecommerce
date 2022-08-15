<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state_list extends Model
{
    use HasFactory;
    protected $table = "state_list";
    public $timestamps = false;
    protected $fillable = ['state_code', 'state'];
}
