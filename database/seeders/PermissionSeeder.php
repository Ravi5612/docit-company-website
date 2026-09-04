<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $modules = [
            'dashboard',
            'leads',
            'blog',
            'college states',
            'colleges',
            'course',
            'privacy policy',
            'terms conditions',
            'users',
            'roles permissions',
            'profile',
        ];

        $actions = ['view', 'create', 'edit', 'delete'];

        foreach ($modules as $module) {
            foreach ($actions as $action) {
                Permission::firstOrCreate([
                    'name' => "$action $module"
                ]);
            }
        }

        // Special module: SETTINGS
        Permission::firstOrCreate(['name' => 'view settings']);
        Permission::firstOrCreate(['name' => 'manage settings']);
        Permission::firstOrCreate(['name' => 'delete settings']);
    }
}