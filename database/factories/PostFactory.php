<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Post::class;
    
    public function definition()
    {
        return [
            'user_id' =>User::factory(),
            'title' => $this->faker->sentence(3),
            'post_image' => $this->faker->imageUrl('900', '300'),
            'body' => $this->faker->Str::Random(20)
        ];
    }
}


// 'user_id' => $this->faker-> factory('App\User'),
            // 'title' => $this->faker->sentence,
            // 'post_image' => $this->faker->imageUrl('900', '300'),
            // 'body' => $this->faker->paragraph