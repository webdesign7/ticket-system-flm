<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RoleUserTableSeeder::class,
        ]);
    }
}
