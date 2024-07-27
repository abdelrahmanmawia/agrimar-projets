<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AdminMiddleware;


Route::middleware("auth")->group(function () {


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('Products',[ProductController::class, 'index'])->name('products.index');

    Route::get('/Products/create', [ProductController::class, 'create']) ->name('products.create');

    Route::post('/Products/store', [ProductController::class, 'store']) ->name('products.store');

    Route::get('/Products/{id}/edit', [ProductController::class, 'edit']) ->name('products.edit');

    Route::put('/Products/{id}', [ProductController::class, 'update']) ->name('products.update');

    Route::get('/Products/show/{id}', [ProductController::class, 'show']) ->name('products.show');

    Route::get('/Products/search', [ProductController::class, 'search']) ->name('products.search');

    Route::get('/Products/delete/{id}', [ProductController::class, 'destroy']) ->name('products.destroy');




});
// admin routes
// user routes
Route::get('/dashboard', [DashboardController::class, 'index'] )->name('dashboard');
Route::get('dashboard/users', [UserController::class, 'index'])->name('dashboard.users');
Route::delete('dashboard/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
// category routes
Route::get('dashboard/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('dashboard/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('dashboard/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('dashboard/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('dashboard/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('dashboard/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

route::middleware("admin")->group(function () {

});




// auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// order routesS
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create/{id}', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/store/{id}', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{id}',[OrderController::class, 'update'])->name('orders.update') ;
Route::get('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');





















