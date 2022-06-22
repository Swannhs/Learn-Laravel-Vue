<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'post_id' => $this->faker->numberBetween(1, 100),
            'up' => $this->faker->numberBetween(0, 100),
            'down' => $this->faker->numberBetween(0, 100),
        ];
    }
}
