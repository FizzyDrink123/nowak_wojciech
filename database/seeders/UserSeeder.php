<?php

namespace Database\Seeders;

// use Illuminate\Support\Carbon;
// use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Role;
// use Illuminate\Foundation\Auth\User;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'Admin test',
            'email' => 'admin.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $adminRole = Role::findByName(config('auth.roles.admin'));
        if (isset($adminRole)) {
            $admin->assignRole($adminRole);
        }

        $worker = User::create([
            'name' => 'Worker test',
            'email' => 'worker.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $workerRole = Role::findByName(config('auth.roles.worker'));
        if (isset($workerRole)) {
            $worker->assignRole($workerRole);
        }

        $user = User::create([
            'name' => 'User test',
            'email' => 'user.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $userRole = Role::findByName(config('auth.roles.user'));
        if (isset($userRole)) {
            $user->assignRole($userRole);
        }

        // User::create([
        //     'name' => 'User test1',
        //     'email' => 'test1@localhost',
        //     'email_verified_at' => Carbon::now(),
        //     'password' => Hash::make('12345678'),
        // ]);
    }
}
