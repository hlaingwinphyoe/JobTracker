<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'job' => ['Full Time', 'Part Time', 'Remote'],
            'user' => ['admin','developer','employer','employee'],
        ];

        foreach ($names as $index => $name_ary) {
            foreach ($name_ary as $name) {
                $slug = Str::slug($name);
                $type = Type::create([
                    'slug' =>  $slug,
                    'name' => $name,
                    'type' => $index
                ]);
            }
        }
    }
}
