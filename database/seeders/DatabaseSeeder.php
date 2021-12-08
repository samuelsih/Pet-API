<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\Taxonomy;
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
        Taxonomy::factory(20)->create();
        Pet::factory(100)->create();
    }
}
