<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Admin']);
        $developer = Role::create(['name' => 'Developer']);

        $employer = Role::create(['name' => 'Employer']);


        $admin->syncPermissions(Permission::all());
        $developer->syncPermissions(Permission::all());

        $permissions = Permission::where('type', 'job')->get();
        $employer->syncPermissions($permissions->pluck('name'));
    }
}
