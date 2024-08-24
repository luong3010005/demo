<?php

// database/seeders/RolePermissionSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $editPostsPermission = Permission::where('name', 'edit posts')->first();
        $deletePostsPermission = Permission::where('name', 'delete posts')->first();

        $adminRole->permissions()->attach([$editPostsPermission->id, $deletePostsPermission->id]);

        $editorRole = Role::where('name', 'editor')->first();
        $editorRole->permissions()->attach([$editPostsPermission->id]);

        // Optional: Add permissions for other roles
    }
}
