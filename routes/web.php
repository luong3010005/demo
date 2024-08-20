<?php

use App\Http\Controllers\AuthController; // Sử dụng đúng namespace cho controller
use App\Http\Controllers\AdminController; // Sử dụng đúng namespace cho controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManagementController;



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



Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
// web.php
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// Display the form for editing a category
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// Update the category in storage
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');


Route::get('/management/create', [ManagementController::class, 'create'])->name('management.create');
Route::post('/management/store', [ManagementController::class, 'store'])->name('management.store');
Route::post('/celestial-body', [ManagementController::class, 'storeCelestialBody'])->name('celestial_body.store');
Route::post('/discovery-data', [ManagementController::class, 'storeDiscoveryData'])->name('discovery_data.store');
Route::post('/moon', [ManagementController::class, 'storeMoon'])->name('moon.store');
Route::post('/media', [ManagementController::class, 'storeMedia'])->name('media.store');
Route::post('/management/planet', [ManagementController::class, 'storePlanet'])->name('storePlanet');
