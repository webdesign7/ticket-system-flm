<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'name' => Role::ROLES['admin'],
            ],
            [
                'id' => 2,
                'name' => Role::ROLES['agent'],
            ]
        ];

        Role::insert($roles);
    }
}
