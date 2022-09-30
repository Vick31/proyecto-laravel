<?php

namespace Database\Seeders;

use App\Models\companies;
use App\Models\roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        roles::insert(
            [
                'name' => 'admin',
                'is_admin' => 1
            ]
        );

        companies::insert(
            [
                'name' => 'companies admin',
                'phone_number' => 123,
                'address' => 'admin123',
                'email' => 'admins@ad.com',
                'created_at' => date("Y/m/d"),
            ]
        );


        User::insert(
            [
                'roles_id' =>  1,
                'companies_id' =>  1, //admin role id
                'name' =>  'admin', //default name
                'dni' => 1,
                'phone_number' =>  1,
                'email' => 'admin@admin.com', //default email
                'password' => Hash::make('admin123'), //default admin password: admin123
                'created_at' => date("Y/m/d"), //created today
            ]
        );
    }
}
