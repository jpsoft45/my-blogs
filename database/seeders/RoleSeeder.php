<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $permissions = Permission::pluck('id', 'id')->all();
        $admin->syncPermissions($permissions);

        $manager = Role::create([
            'name' => 'manager',
            'guard_name' => 'web'
        ]);

        $managerPermission = Permission::pluck('id', 'id')->all();
        $manager->syncPermissions($managerPermission);
        $manager->revokePermissionTo('user-create');


        $blogger = Role::create([
            'name' => 'blogger',
            'guard_name' => 'web'
        ]);
        $blogger->syncPermissions(['post-list','post-create','post-edit',]);
    }
}
