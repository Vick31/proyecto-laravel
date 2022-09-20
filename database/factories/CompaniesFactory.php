<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompaniesFactory extends Factory
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
            'logo'=>$this->faker->imageUrl($width = 640, $height = 480),
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->tollFreePhoneNumber(),
            'direction'=> $this->faker-> text(10),
            'email' =>$this->faker-> email(),
        ];
    }
}
