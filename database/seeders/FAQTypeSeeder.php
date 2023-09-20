<?php

namespace Database\Seeders;

use App\Models\FAQType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FAQType::create([
            'slug' => "faq",
            'name' => "FAQ",
        ]);

        FAQType::create([
            'slug' => "terms-and-conditions",
            'name' => "Terms and Conditions",
        ]);

        FAQType::create([
            'slug' => "privacy-policy",
            'name' => "Privacy Policy",
        ]);
    }
}
