<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventsFactory extends Factory
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
            'date'=>$this->faker->dateTimeBetween(),
            'description'=> $this->faker-> text(10),
            'client_id'=>$this->faker->text(10),
            'report_id'=>$this->faker->text(10),
            'users_id'=>$this->faker->numberBetween($min = 1 , $max = 20),
        ];
    }
}
