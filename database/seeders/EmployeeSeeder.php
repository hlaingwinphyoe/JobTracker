<?php

namespace Database\Seeders;

use App\Models\Employee;
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

        // foreach ($employees as $employee) {
        //     $employee->assignRole('Employee');

        //     $empr_role = Role::where('name', 'Employee')->first();

        //     foreach ($empr_role->permissions as $permission) {
        //         $employee->givePermissionTo($permission);
        //     }
        // }
    }
}
