<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'rescuer'
        ]);
        Permission::create([
            'name' => 'edit user'
        ]);
        Permission::create([
            'name' => 'add user'
        ]);
        Permission::create([
            'name' => 'delete user'
        ]);
        Permission::create([
            'name' => 'access to list users'
        ]);
        Permission::create([
            'name' => 'manage inbox'
        ]);
        $admin = \App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'active' => 1
        ]);

        $admin->assignRole('admin');

        $role->givePermissionTo(Permission::all());

        for ($i = 0; $i < 10; $i++) {
            \App\User::create([
                'name' => 'resucer_' . $i,
                'email' => $i . 'resucer@resucer.com',
                'password' => bcrypt('123456'),
                'lng' => $i * 2.4,
                'lat' => $i * 2.7,
                'active' => 1
            ]);
        }
        \App\User::create([
            'name' => 'oussama',
            'email' => 'resucer@resucer.com',
            'password' => bcrypt('123456'),
            'lng' => 3.1744519478341197,
            'lat' => 36.70443880839400,
            'active' => 1
        ]);
        \App\User::create([
            'name' => 'issam',
            'email' => 'resucer14@resucer.com',
            'password' => bcrypt('123456'),
            'lng' => 3.1744519478341197,
            'lat' => 36.70443880839400,
            'active' => 1
        ]);
        \App\User::create([
            'name' => 'alaeddine',
            'email' => 'resucer11@resucer.com',
            'password' => bcrypt('123456'),
            'lng' => 3.1754519478341197,
            'lat' => 36.70443880839400,
            'active' => 1
        ]);
        \App\User::create([
            'name' => 'mohamed',
            'email' => 'resucer12@resucer.com',
            'password' => bcrypt('123456'),
            'lng' => 3.1654519478341197,
            'lat' => 36.70443880839400,
            'active' => 1
        ]);

        \App\User::create([
            'name' => 'younes',
            'email' => 'resucer13@resucer.com',
            'password' => bcrypt('123456'),
            'lng' => 3.1754519478341197,
            'lat' => 36.70243880839400,
            'active' => 1
        ]);

    }
