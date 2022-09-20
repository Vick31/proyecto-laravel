<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
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
            'dni_type'=>$this->faker->name(),
            'dni'=> $this->faker-> ean8(),
            'address'=>$this->faker->address(),
            'phone_number'=>$this->faker->e164PhoneNumber(),
            'email' =>$this->faker-> email(),
            'users_id'=>$this->faker->numberBetween($min = 1 , $max = 20),
            'client_id'=>$this->faker->text(10),
            'direction'=> $this->faker-> text(10),
        ];
    }
}
