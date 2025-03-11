<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => Post::inRandomOrder()->first()->id,
            'path' => fake()->imageUrl(),
        ];
    }
}
