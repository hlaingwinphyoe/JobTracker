<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'employee' => ['Access Employee','Write Employee','View Employee', 'Edit Employee','Delete Employee'],
            'employer' => ['Access Employer','Write Employer','View Employer', 'Edit Employer','Delete Employer'],
            'job' => ['Access Job','Write Job','View Job', 'Edit Job','Delete Job'],
            'applied job' => ['Access Applied Job','Write Applied Job','View Applied Job','Edit Applied Job','Delete Applied Job'],
            'category' => ['Access Category','Write Category','View Category', 'Edit Category','Delete Category'],
            'type' => ['Access Type','Write Type','View Type', 'Edit Type','Delete Type'],
            'role' => ['Access Role','Write Role','View Role', 'Edit Role','Delete Role'],
            'user' => ['Access User','Write User','View User', 'Edit User','Delete User'],
            'permission' => ['Access Permission','Write Permission','View Permission', 'Edit Permission','Delete Permission'],
            'faq' => ['Access FAQ','Write FAQ','View FAQ', 'Edit FAQ','Delete FAQ'],
            'terms and conditions' => ['Access Terms and Conditions','Write Terms and Conditions','View Terms and Conditions','Edit Terms and Conditions','Delete Terms and Conditions'],
            'privacy policy' => ['Access Privacy Policy','Write Privacy Policy','View Privacy Policy','Edit Privacy Policy','Delete Privacy Policy'],
        ];

        foreach ($permissions as $index => $perm) {
            foreach ($perm as $name) {
                $permission = Permission::create([
                    // 'slug' => Str::slug($name),
                    'name' => $name,
                    // 'type' => $index,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}
