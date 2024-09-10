<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'content' => $this->faker->paragraph,
            'slug' => Str::slug($title),  // Generate the slug from the title
            'user_id'=>Auth::user()->id,
        ];
    }
}
