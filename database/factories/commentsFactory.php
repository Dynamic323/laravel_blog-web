<?php

namespace Database\Factories;

use App\Models\post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class commentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content'=>$this->faker->paragraph(),
            'user_id' => User::factory(), // Create or get a user and associate it with the comment
            'post_id' => post::factory(),
        ];
    }
}
