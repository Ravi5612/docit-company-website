<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create Super Admin Role
        $role = Role::firstOrCreate(['name' => 'super-admin']);

        // Give ALL permissions to super-admin
        $role->syncPermissions(Permission::all());

        // Create Super Admin User
        $user = User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL', 'vibrantick@gmail.com')],
            [
                'name' => 'Super Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD', '12345678')),
            ]
        );

        // Assign role
        if (!$user->hasRole('super-admin')) {
            $user->assignRole($role);
        }
    }
}