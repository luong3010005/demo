<?php

// database/seeders/UserRoleSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $user = User::where('email', 'tranducthang@gmail.com')->first();
        if ($user) {
            $user->roles()->attach($adminRole->id);
        }

        // Optional: Add roles for other users
    }
}
