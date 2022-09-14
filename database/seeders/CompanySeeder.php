<?php

namespace Database\Seeders;

use App\Models\company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        company::factory(2)->create();
    }
}
