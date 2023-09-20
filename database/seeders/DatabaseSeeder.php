<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            RegionSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            StatusSeeder::class,
<<<<<<< HEAD
            CategorySeeder::class,
=======
            FAQTypeSeeder::class,
>>>>>>> 9d54b0ccb1e275166ebe5efccfdfca4aa697b891
        ]);
    }
}
