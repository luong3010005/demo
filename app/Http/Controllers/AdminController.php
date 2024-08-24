<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // Bạn có thể sử dụng middleware ở đây nếu cần
        // $this->middleware('auth');
    }

    public function index()
    {
        // Kiểm tra quyền truy cập
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return view('admin.index');
        }

        return redirect('/')->withErrors(['error' => 'Bạn không có quyền truy cập vào trang này.']);
    }
}


