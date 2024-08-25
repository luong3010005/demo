<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    protected function authenticated(Request $request, $user)
    {
        // Kiểm tra nếu người dùng có vai trò 'admin'
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard'); // Chuyển hướng admin đến bảng điều khiển admin
        }

        // Nếu không phải admin, đăng xuất và trả về trang login với thông báo lỗi
        auth()->logout();
        return redirect()->route('login12')->withErrors(['error' => 'Bạn không có quyền truy cập trang quản trị.']);
    }
}
