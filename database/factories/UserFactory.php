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
            'email'=>$this->faker->text($maxNbChars = 70),
            'password'=> $this->faker->password(),
            'roles_id'=>$this->faker->numberBetween($min = 1, $max = 6),
            'companies_id'=>$this->faker->numberBetween($min = 1, $max = 6),
        ];
    }
}
