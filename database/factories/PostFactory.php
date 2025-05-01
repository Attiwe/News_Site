<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => fake('ar_SA')->sentence(3),
            'desc' => fake()->paragraph(5),
            'number_view' =>  rand(0, 100),
            'smail_desc' => fake()->sentence(3),
            'status' => fake()->boolean(),
            'comment_able' => fake()->boolean(),
        ];
    }
}
