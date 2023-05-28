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
        // User::factory(10)->create();
        $this->call([
            PendidikanSeeder::class,
            KelasSeeder::class,
            UserSeeder::class,
            SiswaSeeder::class,
            TentorSeeder::class,
        ]);
    }
}
