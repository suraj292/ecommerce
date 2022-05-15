<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_order', function (Blueprint $table) {
            $table->id();
            $table->string('razorpay_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('user_delivery_id')->nullable();//user address id
            $table->string('i_think_logistics_id')->nullable();
            $table->string('product_user_cart_ids')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->string('order_number');
            $table->char('invoice_number')->nullable();
            $table->date('dispatch')->nullable();
            $table->string('total_payable_cost');
            $table->string('gst_charge');
            $table->integer('delivery_status')->default(1);
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('user_order')->insert(['order_number'=>'ORD2020110000', 'invoice_number'=>'INV2020110000', 'total_payable_cost'=>'0', 'gst_charge'=>'0']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_order');
    }
}
