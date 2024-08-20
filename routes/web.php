<?php

use App\Http\Controllers\AuthController; 
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;

use Illuminate\Support\Facades\Route;



Route::get('/login', [AuthController::class, 'index']);
Route::get('/', [AuthController::class, 'index1']); 



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
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');


Route::get('/management/create', [ManagementController::class, 'create'])->name('management.create');
Route::post('/management/store', [ManagementController::class, 'store'])->name('management.store');
Route::post('/celestial-body', [ManagementController::class, 'storeCelestialBody'])->name('celestial_body.store');
Route::get('/celestial-bodies', [ManagementController::class, 'index'])->name('management-show');
Route::get('edit/{celestialBody}', [ManagementController::class, 'edit'])->name('edit.celestialBody');
Route::put('update/{celestialBody}', [ManagementController::class, 'update'])->name('update.celestialBody');
Route::delete('destroy/{celestialBody}', [ManagementController::class, 'destroy'])->name('destroy.celestialBody');


Route::get('news/create', [NewsController::class, 'createnews'])->name('news.create');
Route::post('/news/store', [NewsController::class, 'storeNews'])->name('news.store');
Route::get('/news/show', [NewsController::class, 'index'])->name('news.index');
Route::get('news/edit/{id}', [NewsController::class, 'newedit'])->name('news.edit');
Route::put('news/update/{id}', [NewsController::class, 'newupdate'])->name('news.update');
Route::delete('news/destroy/{id}', [NewsController::class, 'newdestroy'])->name('news.destroy');

Route::get('videos/create', [VideoController::class, 'createvideo'])->name('videos.create');
Route::post('videos', [VideoController::class, 'storevideo'])->name('videos.store');
Route::get('videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('videos/{id}', [VideoController::class, 'show'])->name('videos.show');
Route::get('videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::put('videos/{id}', [VideoController::class, 'update'])->name('videos.update');
Route::delete('videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');