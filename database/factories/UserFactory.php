<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'dni'=>$this->faker->ean8(),
            'dni_tipe'=>$this->faker->numberBetween(),
            'email'=>$this->faker->text($maxNbChars = 70),
            'phone_number'=>$this->faker->e164PhoneNumber(),
            'password'=> $this->faker->password(),
            'roles_id'=>$this->faker->numberBetween($min = 1, $max = 6),
            'companies_id'=>$this->faker->numberBetween($min = 1, $max = 6),
        ];
    }
}
