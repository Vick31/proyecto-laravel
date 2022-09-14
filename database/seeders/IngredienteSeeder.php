<?php

namespace Database\Seeders;

use App\Models\ingrediente;
use Illuminate\Database\Seeder;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ingrediente::factory(11)->create();
    }
}
