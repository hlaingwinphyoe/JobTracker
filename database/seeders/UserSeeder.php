<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'phone' => '09987654321',
            'email' => 'admin@example.com',
            'password' => bcrypt('09987654321'),
        ])->assignRole('Admin')->givePermissionTo(Permission::all());

        $developer = User::create([
            'name' => 'developer',
            'phone' => '09400123456',
            'email' => 'developer@example.com',
            'password' => bcrypt('09400123456'),
        ])->assignRole('Developer')->givePermissionTo(Permission::all());
    }
}
