<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_banner_image', function (Blueprint $table) {
            $table->id();
            $table->string('image_link');
            $table->string('redirect_link');
        });
        \Illuminate\Support\Facades\DB::table('home_banner_image')->insert([
            [
                'image_link' => '1WEX1N1hN1xd_XZjifn8Sh1gFcHQqgHRS',
                'redirect_link' => '#',
            ],
            [
                'image_link' => '1dW1CjhoyhrFFrRAfVCE5N3szF4NB6nSd',
                'redirect_link' => '#',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_banner_image_tabel');
    }
};
