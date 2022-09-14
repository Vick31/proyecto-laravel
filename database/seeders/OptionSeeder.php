<?php

namespace Database\Seeders;

use App\Models\option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        option::factory(20)->create();
    }
}
