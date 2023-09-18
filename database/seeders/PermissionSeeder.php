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
            'job' => ['Access Job','Write Job','Edit Job','Delete Job'],
            'category' => ['Access Category','Write Category','Edit Category','Delete Category'],
            'type' => ['Access Type','Write Type','Edit Type','Delete Type'],
            'role' => ['Access Role','Write Role','Edit Role','Delete Role'],
            'user' => ['Access User','Write User','Edit User','Delete User'],
        ];

        foreach ($permissions as $index => $perm) {
            foreach ($perm as $name) {
                $permission = Permission::create([
                    // 'slug' => Str::slug($name),
                    'name' => $name,
                    'type' => $index
                ]);
            }
        }
    }
}
