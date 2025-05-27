<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
  
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-delte',
            
        ];

        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
            # code...
        }
    }
}
