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
            "user_id" => $this->faker->numberBetween(1, 5)
        ];

        $values["slug"] = Str::slug($values["title"]);

        return $values;
    }
}
