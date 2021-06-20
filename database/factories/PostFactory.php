<?php

namespace Database\Factories;

use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'name' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'created_by' => 1,

        ];
    }

}
