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
            'employee' => ['Access Employee','Write Employee','Edit Employee','Delete Employee'],
            'employer' => ['Access Employer','Write Employer','Edit Employer','Delete Employer'],
            'job' => ['Access Job','Write Job','Edit Job','Delete Job'],
            'category' => ['Access Category','Write Category','Edit Category','Delete Category'],
            'type' => ['Access Type','Write Type','Edit Type','Delete Type'],
            'role' => ['Access Role','Write Role','Edit Role','Delete Role'],
            'user' => ['Access User','Write User','Edit User','Delete User'],
            'faq' => ['Access FAQ','Write FAQ','Edit FAQ','Delete FAQ'],
            'terms and conditions' => ['Access Terms and Conditions','Write Terms and Conditions','Edit Terms and Conditions','Delete Terms and Conditions'],
            'privacy policy' => ['Access Privacy Policy','Write Privacy Policy','Edit Privacy Policy','Delete Privacy Policy'],
        ];

        foreach ($permissions as $index => $perm) {
            foreach ($perm as $name) {
                $permission = Permission::create([
                    // 'slug' => Str::slug($name),
                    'name' => $name,
                    'type' => $index,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}
