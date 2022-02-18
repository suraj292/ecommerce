<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pin_code', function (Blueprint $table) {
            $table->id();
            $table->string('pincode');
            $table->string('pickup')->nullable();
            $table->string('air_prepaid')->nullable();
            $table->string('air_cod')->nullable();
            $table->string('reverse')->nullable();
            $table->string('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pin_code');
    }
}
