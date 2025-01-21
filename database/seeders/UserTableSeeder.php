<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'info@webdesign7.co.uk',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'name' => 'Agent',
                'email' => 'agent@admin.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ]
        ];

        User::insert($users);
    }
}
