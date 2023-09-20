<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['Mandalay'],
            ['Yangon'],
            ['Nay Pyi Taw'],
            ['Magway'],
            ['Ayeyar Waddy'],
            ['Bago'],
            ['Sagaing'],
            ['Tanintharyi'],
            ['Kachin State'],
            ['Kaya State'],
            ['Shan State'],
            ['Kayin State'],
            ['Chin State'],
            ['Mon State'],
            ['Rakhin State'],
        ];

        foreach ($data as $region) {
            foreach ($region as $name) {
                $slug = Str::slug($name);
                $regions = Region::create([
                    'slug' => $slug,
                    'name' => $name,
                    'country_id' => 1
                ]);
            }
        }
    }
}
