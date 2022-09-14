<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clients_id'=>$this->faker->numberBetween($min = 1, $max = 40),
            'datetime'=>$this->faker->ean8(),
            'valor_total'=>$this->faker->numberBetween($min = 10000, $max = 20000),
            'aprobacion'=>$this->faker->numberBetween($min = 1, $max = 2),
            'estado'=>$this->faker->numberBetween($min = 1, $max = 2),
        ];
    }
}
