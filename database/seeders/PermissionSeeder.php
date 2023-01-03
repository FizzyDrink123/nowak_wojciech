<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name'=>'users.index']);
        Permission::create(['name'=>'users.store']);
        Permission::create(['name'=>'users.destroy']);
        Permission::create(['name'=>'users.change_role']);

        Permission::create(['name' => 'log-viewer']);

        Permission::create(['name'=>'categories.index']);
        Permission::create(['name'=>'categories.manage']);

        Permission::create(['name' => 'manufacturers.index']);
        Permission::create(['name' => 'manufacturers.manage']);

        Permission::create(['name' => 'movies.index']);
        Permission::create(['name' => 'movies.manage']);

        Permission::create(['name' => 'schedules.index']);
        Permission::create(['name' => 'schedules.manage']);

        $adminRole = Role::findByName(config('auth.roles.admin'));
        $adminRole->givePermissionTo('users.index');
        $adminRole->givePermissionTo('users.store');
        $adminRole->givePermissionTo('users.destroy');
        $adminRole->givePermissionTo('users.change_role');
        $adminRole->givePermissionTo('manufacturers.index');
        $adminRole->givePermissionTo('manufacturers.manage');
        $adminRole->givePermissionTo('movies.index');
        $adminRole->givePermissionTo('movies.manage');
        $adminRole->givePermissionTo('schedules.index');
        $adminRole->givePermissionTo('schedules.manage');

        $adminRole->givePermissionTo('log-viewer');

        $adminRole->givePermissionTo('categories.index');
        $adminRole->givePermissionTo('categories.manage');

        $workerRole=Role::findByName(config('auth.roles.worker'));
        $workerRole->givePermissionTo('categories.index');
        $workerRole->givePermissionTo('manufacturers.index');
        $workerRole->givePermissionTo('movies.index');
        $workerRole->givePermissionTo('schedules.index');
        $workerRole->givePermissionTo('schedules.manage');
        

        $userRole=Role::findByName(config('auth.roles.user'));
        $userRole->givePermissionTo('categories.index');
        $userRole->givePermissionTo('manufacturers.index');
        $userRole->givePermissionTo('movies.index');
        $userRole->givePermissionTo('schedules.index');
    }
}
