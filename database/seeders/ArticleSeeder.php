<?php

namespace Database\Seeders;

use App\Models\article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        article::factory(20)->create();
    }
}
