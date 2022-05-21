<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_order extends Model
{
    use HasFactory;
    protected $table ="user_order";
    protected $fillable = [
        'razorpay_id',
        'user_id',
        'user_delivery_id',
        'i_think_logistics_id',
        'product_user_cart_ids',
        'coupon_code',
        'coupon_discount',
        'order_number',
        'invoice_number',
        'dispatch',
        'total_payable_cost',
        'gst_charge',
        'delivery_status',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
