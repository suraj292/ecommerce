<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_profile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('gstin');
            $table->string('mobile');
            $table->string('email')->nullable();
        });

        \Illuminate\Support\Facades\DB::table('admin_profile')->insert([
            'name'=>'admin',
            'address'=>'FB-187, Lajpat Nagar, Sahibabad (201005), Ghaziabad, U.P',
            'gstin'=>'09CHJPB4651A1ZQ',
            'mobile'=>'9876543210',
            'email'=>'role@houseofbhavana.in',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_profile');
    }
}
