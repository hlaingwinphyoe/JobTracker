<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['Administrative'],
            ['Architecture Design'],
            ['Accounting'],
            ['Customer Service'],
            ['Digital Marketing'],
            ['Human Resource'],
            ['Hospitality'],
            ['IT Engineer'],
            ['Manufacturing'],
            ['Nursing'],
            ['Science Laboratory'],
            ['Sales & Marketing'],
            ['Translation'],
            ['Web Designer'],
            ['Web Developer'],
            ['Software Developer'],
            ['Software Engineer'],
            ['Management']
        ];

        foreach ($categories as $category) {
            foreach ($category as $name) {
                $slug = Str::slug($name);
                $category = Category::create([
                    'slug' => $slug,
                    'name' => $name,
                ]);
            }
        }
    }
}
