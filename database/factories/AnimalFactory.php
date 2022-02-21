<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                  'name'=>$this->faker->unique()->word(),
                  'species'=>$this->faker->word(),
                  'description'=>$this->faker->sentence(),
                  'url'=>$this->faker->imageUrl(640, 480, 'animals', true)

        ];
    }
}
