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
                'image_link' => 'https://images.unsplash.com/photo-1621252346441-c42a54aa8707?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80',
                'redirect_link' => '#',
            ],
            [
                'image_link' => 'https://images.unsplash.com/photo-1523779105320-d1cd346ff52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1173&q=80',
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
