<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ingredientes_id'=>$this->faker->numberBetween($min = 1 , $max = 20),
            'invoice_details_id'=>$this->faker->numberBetween($min = 1 , $max = 100),
            'price'=>$this->faker->numberBetween($min = 10010 , $max = 21010),
            'cantidad'=>$this->faker->numberBetween($min = 1 , $max = 20),
            'price'=>$this->faker->numberBetween($min = 1000 , $max = 20000),
            'total' =>$this->faker-> numberBetween($min = 1000 , $max = 20000),
        ];
    }
}
