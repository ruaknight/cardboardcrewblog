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
            'title' => fake()->sentence,
            'excerpt' => fake()->sentence,
            'main_image' => fake()->imageUrl(1280,720),
            'body' => fake()->paragraph,
            'user_id' => fake()->biasedNumberBetween(1, 10),
            'category_id' => fake()->biasedNumberBetween(1, 2)
        ];
    }
}
