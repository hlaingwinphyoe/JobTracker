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
        $operator = Role::create(['name' => 'Operator']);

        $employer = Role::create(['name' => 'Employer']);
        $employee = Role::create(['name' => 'Employee']);

        $admin->syncPermissions(Permission::all());
        $developer->syncPermissions(Permission::all());

        $employer->syncPermissions(Permission::whereIn('name', ['Access Job', 'Write Job','View Job', 'Edit Job'])->get()->pluck('name'));

        $operator->syncPermissions(Permission::whereIn('name', 
        ['Access Job', 'Write Job','View Job', 'Edit Job', 'Delete Job',
        'Access Category', 'Write Category','View Category', 'Edit Category', 'Delete Category',
        'Access Type', 'Write Type','View Type', 'Edit Type', 'Delete Type',
        'Access FAQ', 'Write FAQ','View FAQ', 'Edit FAQ', 'Delete FAQ',
        'Access Terms and Conditions', 'Write Terms and Conditions', 'View Terms and Conditions', 'Edit Terms and Conditions', 'Delete Terms and Conditions',
        'Access Privacy Policy', 'Write Privacy Policy','View Privacy Policy', 'Edit Privacy Policy', 'Delete Privacy Policy',])->get()->pluck('name'));
    }
}
