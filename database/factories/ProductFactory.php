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
            'product_code' => $this->faker->word,
            'product_description' => $this->faker->text,
            'product_price' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
