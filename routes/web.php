<?php

use App\Http\Controllers\AuthController; 
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

// routes/web.php


Route::get('/celestial-thethe/{slug}', [AuthController::class, 'show1'])->name('celestialBody.show');


// Route::get('/login', [AuthController::class, 'index']);
Route::get('/', [AuthController::class, 'index1'])->name('home'); 
Route::get('news/{slug}', [AuthController::class, 'show'])->name('news.show');
Route::get('celestial-body/{slug}', [AuthController::class, 'showCelestialBody'])->name('celestial-body.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';







Route::get('login1', [AuthController::class, 'showLoginForm'])->name('login1');
Route::post('admin/login', [AuthController::class, 'login1'])->name('login.submit');
Route::get('admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');






Route::get('/management/create', [ManagementController::class, 'create'])->name('management.create');
Route::post('/management/store', [ManagementController::class, 'store'])->name('management.store');
Route::post('/celestial-body', [ManagementController::class, 'storeCelestialBody'])->name('celestial_body.store');
Route::get('/celestial-bodies', [ManagementController::class, 'index'])->name('management-show');
Route::get('edit/{celestialBody}', [ManagementController::class, 'edit'])->name('edit.celestialBody');
Route::put('update/{celestialBody}', [ManagementController::class, 'update'])->name('update.celestialBody');
Route::delete('destroy/{celestialBody}', [ManagementController::class, 'destroy'])->name('destroy.celestialBody');

Route::prefix('admin')->group(function () {
Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/store', [NewsController::class, 'storeNews'])->name('news.store');
Route::get('/news/show', [NewsController::class, 'index'])->name('news.index');
Route::get('news/edit/{id}', [NewsController::class, 'newedit'])->name('news.edit');
Route::put('news/update/{id}', [NewsController::class, 'newupdate'])->name('news.update');
Route::delete('news/destroy/{id}', [NewsController::class, 'newdestroy'])->name('news.destroy');
Route::get('/news', [AuthController::class, 'new'])->name('news.index12');



Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/category/{slug}', [CategoryController::class, 'index1'])->name('category.index1');



Route::get('videos/create', [VideoController::class, 'createvideo'])->name('videos.create');
Route::post('videos', [VideoController::class, 'storevideo'])->name('videos.store');
Route::get('videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('videos/{id}', [VideoController::class, 'show'])->name('videos.show');
Route::get('videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::put('videos/{id}', [VideoController::class, 'update'])->name('videos.update');
Route::delete('videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
Route::get('/videos-show', [AuthController::class, 'video'])->name('videos');



Route::get('products', [ProductController::class, 'index'])->name('products.index'); // List all products
Route::get('products/create', [ProductController::class, 'create'])->name('products.create'); // Show form to create a new product
Route::post('products', [ProductController::class, 'store'])->name('products.store'); // Store a new product
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show'); // Show a single product
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Show form to edit a product
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update'); // Update a product
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Delete a product

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
});


// routes/web.php

use App\Http\Controllers\Admin\OrderController;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
});






Route::get('products1', [ProductController::class, 'index1'])->name('products.index'); // List all products
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show'); // Show product details

Route::post('cart', [CartController::class, 'store'])->name('cart.store'); // Add to cart
Route::get('cart', [CartController::class, 'index'])->name('cart.index'); // View cart
Route::delete('cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy'); // Remove from car
Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');

// routes/web.php

use App\Http\Controllers\CheckoutController;

Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');




use App\Http\Controllers\ObservatoryController;

// Route để hiển thị danh sách đài quan sát
Route::get('observatories', [ObservatoryController::class, 'index'])->name('observatories.index');

// Route để hiển thị form thêm đài quan sát
Route::get('observatories/create', [ObservatoryController::class, 'create'])->name('observatories.create');

// Route để lưu đài quan sát mới
Route::post('observatories', [ObservatoryController::class, 'store'])->name('observatories.store');

// Route để hiển thị form sửa đài quan sát
Route::get('observatories/{observatory}/edit', [ObservatoryController::class, 'edit'])->name('observatories.edit');

// Route để cập nhật đài quan sát
Route::put('observatories/{observatory}', [ObservatoryController::class, 'update'])->name('observatories.update');

// Route để xóa đài quan sát
Route::delete('observatories/{observatory}', [ObservatoryController::class, 'destroy'])->name('observatories.destroy');
