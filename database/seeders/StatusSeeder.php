<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'sex' => ['Male', 'Female'],
            'time' => ['Hour', 'Day', 'Month', 'Year'],
            'status' => ['Pending', 'Approved', 'Rejected'],
            'job_status' => ['Available', 'Closed']
        ];

        foreach ($names as $index => $name_ary) {
            foreach ($name_ary as $name) {
                $slug = Str::slug($name);
                $status = Status::create([
                    'slug' =>  $slug,
                    'title' => $name,
                    'type' => $index
                ]);
            }
        }
    }
}
