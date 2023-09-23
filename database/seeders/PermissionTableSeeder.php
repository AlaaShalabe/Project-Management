<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'specialty-list',
            'specialty-create',
            'specialty-edit',
            'specialty-delete',
            'subSpecialty-list',
            'subSpecialty-create',
            'subSpecialty-edit',
            'subSpecialty-delete',
            'shift-list',
            'shift-create',
            'shift-edit',
            'shift-delete',
            'email-list'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
