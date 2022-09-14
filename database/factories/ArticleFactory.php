<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'companies_id'=>$this->faker->numberBetween($min = 1, $max = 10),
            'name'=> $this->faker->company(),
            'price'=>$this->faker->numberBetween($min = 20000, $max = 1200000),
            'image' =>$this->faker->imageUrl('cats', true, 'Faker'),
        ];
    }
}
