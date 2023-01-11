<?php

namespace Database\Seeders;

use App\Models\Likes;
use Illuminate\Database\Seeder;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Likes::factory(30)->create();
    }
}
