<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = ["sports", "politics", "economy", "technology", "lifestyle", "health"];

        foreach($tags as $tag){
            Tag::factory()->state([
                "name" => $tag,
            ])->create();
        }
    }
}
