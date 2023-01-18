<?php

namespace Database\Factories;

use App\Models\board;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class boardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = board::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->realText(180),
            'text' => $this->faker->realText(180),
            'thumbnail' => 'profile-photos/69vk0ZgZ3GVJTP1Zm5rQ7R3iENZbAcESrK98Fu6j.jpg'
        ];
    }
}
