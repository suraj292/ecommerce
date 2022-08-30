<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->unique()->nullable();
            $table->string('social_network')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('users')
            ->insert([
                'name'=>'suraj', 'email'=>'admin@houseofbhavana.in', 'mobile'=>'9999999999', 'password'=>'password@123#'
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
