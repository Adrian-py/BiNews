<?php

namespace Database\Seeders;

use App\Models\NewsPost;
use App\Models\NewsTags;
use Illuminate\Database\Seeder;

class NewsPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        NewsPost::factory()->count(20)->create();
    }
}
