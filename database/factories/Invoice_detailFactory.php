<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Invoice_detailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoices_id'=>$this->faker->numberBetween($min = 1 , $max = 100),
            'articles_id'=>$this->faker->numberBetween($min = 1 , $max = 50),
            'price'=>$this->faker->numberBetween($min = 100 , $max = 20000),
            'total'=>$this->faker->numberBetween($min = 1000 , $max = 20000),
            'cantidad'=>$this->faker->numberBetween($min = 1 , $max = 20),
        ];
    }
}
