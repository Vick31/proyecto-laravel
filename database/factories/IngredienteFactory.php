<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngredienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'articles_id'=>$this->faker->numberBetween($min = 1, $max = 50 ),
            'name'=>$this->faker->name(),
            'price'=>$this->faker->numberBetween($min = 100, $max =2000 ),
        ];
    }
}
