<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    const IMAGE_URL = 'https://source.unsplash.com/random/200x200/?img=1';
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear images
        Storage::deleteDirectory('job_images');

        $this->call([
            TypeSeeder::class,
            CountrySeeder::class,
            RegionSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            StatusSeeder::class,
            CategorySeeder::class,
            JobPostSeeder::class,
            FAQSeeder::class,
            TermsandConditionsSeeder::class,
            PrivacyPolicySeeder::class,
        ]);
    }
}
