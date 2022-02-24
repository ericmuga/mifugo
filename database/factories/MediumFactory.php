<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MediumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                 'user_id'=>UserFactory::new(),
                 'slug'=>$this->faker->unique()->slug(),
                 'type'=>$this->faker->randomElement(['video','photo']),

        ];
    }
}
