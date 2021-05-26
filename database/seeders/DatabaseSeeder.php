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
        $this->call([
            CittaSeeder::class,
            Info_generaliSeeder::class,
            Info_meteoSeeder::class,
            UserSeeder::class,
            LikeSeeder::class
        ]);
    }
}
