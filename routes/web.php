<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//user route
Route::middleware(['auth', 'userMiddleware'])->group(function(){
Route::get('dashboard',[UserController::class, 'index'])->name('dashboard');
Route::get('favorite',[FavoriteController::class, 'index'])->name('user.favorite');
// Route::get('/user/product/viewUser', [UserController::class, 'view'])->name('user.product.viewUser');
Route::get('/user/product', [UserController::class, 'view'])->name('user.product.index');


});

//admin route
Route::middleware(['auth', 'adminMiddleware'])->group(function(){
Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
Route::get('admin/product',[ProductController::class, 'index'])->name('admin.product');

Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('/admin/products/save', [ProductController::class, 'save'])->name('admin/products/save');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
    Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/products/delete');
    Route::get('/admin/create', [ProductController::class, 'create'])->name('admin/create');
    Route::get('/admin/edit', [ProductController::class, 'edit'])->name('admin/edit');
    Route::get('/admin/delete', [ProductController::class, 'delete'])->name('admin/delete');
    // Route::get('/admin/update', [ProductController::class, 'update'])->name('admin/update');
    Route::put('/admin/update/{id}', [ProductController::class, 'update'])->name('admin/update');



    
});

