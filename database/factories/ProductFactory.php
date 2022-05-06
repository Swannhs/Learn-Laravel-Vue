<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->word,
            'product_code' => $this->faker->unique()->randomNumber(6),
            'product_description' => $this->faker->text,
            'product_price' => $this->faker->randomFloat(2, 0, 100),
            'category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
