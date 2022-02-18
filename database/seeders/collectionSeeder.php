<?php

namespace Database\Seeders;

use App\Models\collection_link;
use App\Models\collection_name;
use Illuminate\Database\Seeder;

class collectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collection_name::factory()->count(rand(2,4))->create()->each(function ($collection_name){
            collection_link::factory()->count(rand(5,25))->create(['collection_name_id'=>$collection_name->id]);
        });
    }
}
