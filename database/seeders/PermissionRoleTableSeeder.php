<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = Permission::all();
        $agentPermissions = Permission::whereIn('name', [
            'view-categories',
            'view-tickets',
        ])->get();

        $adminRole = Role::where('name', 'Admin')->first();
        $agentRole = Role::where('name', 'Agent')->first();

        $adminRole->permissions()->sync($adminPermissions);
        $agentRole->permissions()->sync($agentPermissions);
    }
}
