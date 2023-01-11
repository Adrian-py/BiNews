<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LikesFactory extends Factory
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
            "user_id" => $this->faker->numberBetween(2, 6),
            "news_post_id" => $this->faker->numberBetween(1, 6),
        ];
    }
}
