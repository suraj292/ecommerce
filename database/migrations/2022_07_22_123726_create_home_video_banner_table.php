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
        Schema::create('home_video_banner', function (Blueprint $table) {
            $table->id();
            $table->string('video');
            $table->string('heading')->nullable();
            $table->text('para')->nullable();
            $table->string('button_name')->nullable();
            $table->string('button_link')->nullable();
        });
        \Illuminate\Support\Facades\DB::table('home_video_banner')->insert([
            'video' => '1k1ZeTmaQDtQK_wVPWT69kfwzZQXYS7ny',
            'heading' => 'Heading here',
            'para' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, quibusdam?',
            'button_name' => 'Click me',
            'button_link' => '#'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_video_banner');
    }
};
