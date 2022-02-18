<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_code', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('value');
            $table->string('max_amount');
            $table->boolean('active')->default(1);
            $table->timestamps();
//            $table->timestamp('expiry_at')->default('+1 Y');
//            $table->timestamp('created_at')->useCurrent();
            $table->date('expire_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_code');
    }
}
