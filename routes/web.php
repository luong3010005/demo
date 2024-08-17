<?php

use App\Http\Controllers\AuthController; // Sử dụng đúng namespace cho controller



Route::get('/login', [AuthController::class, 'index']); // Sử dụng tên controller đúng
Route::get('/', [AuthController::class, 'index1']); // Sử dụng tên controller đúng


