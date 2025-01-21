<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'create-tickets',
            ],
            [
                'name' => 'edit-tickets',
            ],
            [
                'name' => 'delete-tickets',
            ],
            [
                'name' => 'view-tickets',
            ],
            [
                'name' => 'create-users',
            ],
            [
                'name' => 'edit-users',
            ],
            [
                'name' => 'delete-users',
            ],
            [
                'name' => 'view-users',
            ],
            [
                'name' => 'create-roles',
            ],
            [
                'name' => 'edit-roles',
            ],
            [
                'name' => 'delete-roles',
            ],
            [
                'name' => 'view-roles',
            ],
            [
                'name' => 'create-permissions',
            ],
            [
                'name' => 'edit-permissions',
            ],
            [
                'name' => 'delete-permissions',
            ],
            [
                'name' => 'view-permissions',
            ],
            [
                'name' => 'create-categories',
            ],
            [
                'name' => 'edit-categories',
            ],
            [
                'name' => 'delete-categories',
            ],
            [
                'name' => 'view-categories',
            ],

        ];

        Permission::insert($permissions);
    }
}
