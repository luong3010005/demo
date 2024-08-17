<?php

use App\Http\Controllers\AuthController; // Sử dụng đúng namespace cho controller
use App\Http\Controllers\AdminController; // Sử dụng đúng namespace cho controller



Route::get('/login', [AuthController::class, 'index']); // Sử dụng tên controller đúng
Route::get('/', [AuthController::class, 'index1']); // Sử dụng tên controller đúng

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
