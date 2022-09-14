<?php

namespace Database\Seeders;

use App\Models\invoice_detail;
use Illuminate\Database\Seeder;

class InvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        invoice_detail::factory(100)->create();
    }
}
