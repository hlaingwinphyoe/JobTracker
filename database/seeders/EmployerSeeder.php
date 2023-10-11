<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employers = Employer::factory()->count(80)->create();

        foreach ($employers as $employer) {
            $employer->assignRole('Employer');

            $empr_role = Role::where('name', 'Employer')->first();

            foreach ($empr_role->permissions as $permission) {
                $employer->givePermissionTo($permission);
            }
        }
    }
}
