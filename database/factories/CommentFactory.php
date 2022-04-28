<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postId = Post::all()->random()->id;
        return [
            'body' => $this->faker->sentence,
            'post_id' => $postId,
        ];
    }
}
