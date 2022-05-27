<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'email' => 'admin@yopmail.com',
            'name'  => 'Admin',
            'password' => \Hash::make('123456'),
        ]);

        // $permissions = Permission::pluck('id', 'id')->all();
        // $role->syncPermissions($permissions);
        $admin->assignRole('admin');

        $manager = User::create([
            'email' => 'manager@yopmail.com',
            'name'  => 'Manager',
            'password' => \Hash::make('123456'),
        ]);

        $manager->assignRole('manager');

        $blogger = User::create([
            'email' => 'blogger@yopmail.com',
            'name'  => 'Blogger',
            'password' => \Hash::make('123456'),
        ]);

        $blogger->assignRole('blogger');

    }
}
