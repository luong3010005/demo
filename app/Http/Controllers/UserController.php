<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Lấy tất cả người dùng từ cơ sở dữ liệu
        $users = User::all();
        
        // Trả về view và truyền dữ liệu người dùng
        return view('admin.user', compact('users'));
    }

    public function edit($id)
    {
        // Lấy người dùng theo ID
        $user = User::findOrFail($id);
        
        // Lấy tất cả các vai trò
        $roles = Role::all();
        
        // Trả về view chỉnh sửa và truyền dữ liệu người dùng và vai trò
        return view('admin.user_edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'roles' => 'required|array',
        ]);
        
        // Lấy người dùng theo ID
        $user = User::findOrFail($id);
        
        // Cập nhật vai trò của người dùng
        $user->roles()->sync($request->roles);
        
        // Chuyển hướng người dùng về trang danh sách với thông báo thành công
        return redirect()->route('users.index')->with('success', 'Quyền của người dùng đã được cập nhật thành công.');
    }
}
