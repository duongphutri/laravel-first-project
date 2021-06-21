<?php

namespace Database\Factories;

use App\Models\news;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = news::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'title' => $this->faker->title(),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'image_id' => 1,
            'created_by' => 1,
        ];
    }
}
