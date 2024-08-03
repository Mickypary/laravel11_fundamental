<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => $this->faker->text(200),
            'description' => $this->faker->text(30),
            'photo' => $this->faker->image('public/uploads', 640, 500, null, false),
        ];

        // composer dump-autoload
        // php artisan tinker
        // Post::factory()->count(50)->create()
    }
}
