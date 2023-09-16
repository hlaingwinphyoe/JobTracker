<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'employee' => ['access employee','write employee','edit employee','delete employee'],
            'job' => ['access job','write job','edit job','delete job'],
            'category' => ['access category','write category','edit category','delete category'],
            'type' => ['access type','write type','edit type','delete type'],
            'role' => ['access role','write role','edit role','delete role'],
            'user' => ['access user','write user','edit user','delete user'],
        ];

        foreach ($permissions as $index => $perm) {
            foreach ($perm as $name) {
                $permission = Permission::create([
                    'name' => $name,
                    'type' => $index
                ]);
            }
        }
    }
}
