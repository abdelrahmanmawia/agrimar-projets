<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;


Route::middleware("auth")->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

});



Route::get('/profile', function () {
    return view('profile');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('Products',[ProductController::class, 'index'])->name('products.index');

Route::get('/Products/create', [ProductController::class, 'create']) ->name('products.create');

Route::post('/Products/store', [ProductController::class, 'store']) ->name('products.store');

Route::get('/Products/edit/{id}', [ProductController::class, 'edit']) ->name('products.edit');

Route::post('/Products/update/{id}', [ProductController::class, 'update']) ->name('products.update');

Route::get('/Products/show/{id}', [ProductController::class, 'show']) ->name('products.show');

Route::get('/Products/delete/{id}', [ProductController::class, 'delete']) ->name('products.delete');
