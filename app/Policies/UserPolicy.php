<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function accessAdmin(User $user)
    {
        // Kiểm tra nếu người dùng có vai trò 'admin'
        return $user->hasRole('admin');
    }
}
