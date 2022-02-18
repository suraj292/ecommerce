<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\user_address;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(200)->create()->each(function ($user){
            user_address::factory()->count(rand(0,3))->create(['user_id'=>$user->id]);
        });
    }
}
