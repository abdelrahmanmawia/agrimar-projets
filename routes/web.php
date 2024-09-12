<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HajarController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Session\Middleware\StartSession;



// auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware("auth")->group(function () {


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    // Products Routes

    Route::get('myProducts',[ProductController::class, 'index'])->name('products.index');
    Route::get('Products',[ProductController::class, 'products'])->name('products');
    Route::get('/Products/create', [ProductController::class, 'create']) ->name('products.create');
    Route::post('/Products/store', [ProductController::class, 'store']) ->name('products.store');
    Route::get('/Products/{id}/edit', [ProductController::class, 'edit']) ->name('products.edit');
    Route::put('/Products/{id}', [ProductController::class, 'update']) ->name('products.update');
    Route::get('/Products/show/{id}', [ProductController::class, 'show']) ->name('products.show');
    Route::get('/Products/search', [ProductController::class, 'search']) ->name('products.search');
    Route::get('/Products/delete/{id}', [ProductController::class, 'destroy']) ->name('products.destroy');

    // user routes
    Route::get('/dashboard', [DashboardController::class, 'index'] )->name('dashboard');
    Route::get('dashboard/users', [UserController::class, 'index'])->name('dashboard.users');
    Route::get('dashboard/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // category routes
    Route::get('dashboard/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('dashboard/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('dashboard/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('dashboard/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('dashboard/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('dashboard/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // order routes
    Route::post('order/create/{productId}', [OrderController::class, 'create'])->name('order.create');
    Route::get('order/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('user/orders', [OrderController::class, 'userOrders'])->name('user.orders');
    Route::get('seller/orders', [OrderController::class, 'sellerOrders'])->name('seller.orders');
    Route::get('admin/orders', [OrderController::class, 'adminOrders'])->name('admin.orders');

    // cart routes
    Route::get('cart', [CartController::class, 'show'])->name('cart.show');
    Route::get('cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::get('cart/delete/{itemId}', [CartController::class, 'delete'])->name('cart.delete');


    // messages routes
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/chat/{receiver_id}', [MessageController::class, 'chat'])->name('messages.chat');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');

    // profile routes
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit']) ->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update']) ->name('profile.update');
    Route::get('/profile/show/{id}', [ProfileController::class, 'show']) ->name('profile.show');
});




route::middleware("admin")->group(function () {


});


Route::middleware(['web'])->group(function () {

});

Route::middleware(['auth'])->group(function () {

});

























