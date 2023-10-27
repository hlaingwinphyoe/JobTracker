<?php

namespace Database\Seeders;

use App\Models\AppliedJob;
use App\Models\Employee;
use App\Models\JobPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::factory()->count(30)->create();

        foreach ($employees as $employee) {
            $applied = AppliedJob::create([
                'user_id' => $employee->id,
                'job_id' => JobPost::all()->random()->id,
                'amount' => '30',
                'cover_letter' => fake()->text(150),
                'file' => '/images/file/sample.pdf',
                'created_at' => fake()->dateTimeBetween('-9 month', 'now'),
                'updated_at' => fake()->dateTimeBetween('-5 month', 'now'),
            ]);
        }

        // foreach ($employees as $employee) {
        //     $employee->assignRole('Employee');

        //     $empr_role = Role::where('name', 'Employee')->first();

        //     foreach ($empr_role->permissions as $permission) {
        //         $employee->givePermissionTo($permission);
        //     }
        // }
    }
}
