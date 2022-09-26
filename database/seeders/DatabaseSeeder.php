<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            EquipmentSeeder::class,
            ReportsSeeder::class,
            RolesSeeder::class,
            CompaniesSeeder::class,
            ClientSeeder::class,
            UserSeeder::class,
            EventesSeeder::class
        ]);

    }
}
