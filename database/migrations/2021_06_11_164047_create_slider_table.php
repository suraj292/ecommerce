<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('h4')->nullable();
            $table->string('h1')->nullable();
            $table->string('button_link')->nullable();
            $table->char('button_name')->nullable();
        });
//         \Illuminate\Support\Facades\DB::table('slider')->insert([
//            'image'=>'assets/images/furniture/banner/test.jpg',
//            'h4'=>'flat 30% on every order',
//            'h1'=>'Best Deals',
//            'button_link'=>'#',
//            'button_name'=>'shop now',
//        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider');
    }
}
