<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "news_post_id" => $this->faker->numberBetween(1, 20),
            "tag_id" => $this->faker->numberBetween(1, 2),
        ];
    }
}
