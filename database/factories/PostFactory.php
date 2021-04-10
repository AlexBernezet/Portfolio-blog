<?php

namespace Database\Factories;

use App\Models\Post;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'content' => $this->faker->text,
            'slug' => 'slug',
            'published_at' => now(),
            'read_time' => random_int(1000, 10000),
        ];
    }
}
