<?php

namespace Database\Seeders;

use App\Models\invoice;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        invoice::factory(100)->create();
    }
}
