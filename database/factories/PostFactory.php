<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                 'title'=>$this->faker->unique()->sentence(),
                 'type'=>$this->faker->randomElement(['video','photo']),
                 'body'=>$this->faker->paragraph(5,true),
                 'footer'=>$this->faker->sentence(),
                 'dimension'=>$this->faker->word(),
                 'user_id'=>UserFactory::new()

        ];
    }
}
