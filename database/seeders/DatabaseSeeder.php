<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,    // Add this line to run UserSeeder first
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
