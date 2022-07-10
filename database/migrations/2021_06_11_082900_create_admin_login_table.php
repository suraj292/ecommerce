<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_login', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->rememberToken();
        });
        \Illuminate\Support\Facades\DB::table('admin_login')->insert([
            ['username'=>'admin', 'password'=>'admin123'],
            ['username'=>'editor', 'password'=>'password'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_login');
    }
}
