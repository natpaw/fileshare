<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
			'title' => $this->faker->sentence(),
			'short' => $this->faker->sentence(),
			'slug' => $this->faker->slug(),
			'body' => $this->faker->realText($maxNbChars = 400, $indexSize = 2),
        ];
    }
}
