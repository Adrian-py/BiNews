<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
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
            Tags::factory()->state([
                "name" => $tag,
            ])->create();
        }
    }
}
