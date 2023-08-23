<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            "title"       => fake()->sentence(4),
            "description" => fake()->text(24),
            "body"        => fake()->text(50),
            "user_id"     => User::factory(),
            "status"      => fake()->boolean(),
        ];
    }
}
