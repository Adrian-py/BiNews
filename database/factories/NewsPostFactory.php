<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $values = [
            "title" => $this->faker->words(rand(5, 10), true),
            "content" => $this->faker->text(),
            "users_id" => 1,
            "news_tags_id" => $this->faker->numberBetween(1, 6),
        ];

        $values["slug"] = Str::slug($values["title"]);

        return $values;
    }
}
