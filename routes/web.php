<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsMenController;
use App\Http\Controllers\ProductsWomenController;
use App\Http\Controllers\ProductsAccessoriesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(1);
    return inertia::render('Home', [
        'productsMen' => Product::all()->where('type', 'men')->take(4),
        'productsWomen' => Product::all()->where('type', 'women')->take(4),
        'product' => Product::all()->where('type', 'men')->where('category_id', '14')->random(1),
    ]);
});

Route::get('/collections/men', [ProductsMenController::class, 'index']);
Route::get('/collections/men/{product:slug}', [ProductsMenController::class, 'show']);

Route::get('/collections/women', [ProductsWomenController::class, 'index']);
Route::get('/collections/women/{product:slug}', [ProductsWomenController::class, 'show']);

Route::get('/collections/accessories', [ProductsAccessoriesController::class, 'index']);
Route::get('/collections/accessories/{product:slug}', [ProductsAccessoriesController::class, 'show']);

Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::get('recover-password', [LoginController::class, 'reset_passwordView']);
Route::post('reset-password', [LoginController::class, 'reset_password']);


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/checkouts', [CartController::class, 'index'])->middleware('auth');
Route::get('/getproducts', [CartController::class, 'getProducts']);
Route::post('/cart-add', [CartController::class, 'add']);
Route::post('/cart-update', [CartController::class, 'updateQuantity']);
Route::post('/cart-remove', [CartController::class, 'remove']);
Route::post('/cart-checkout', [CartController::class, 'checkout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->can('admin', 'App\\Models\User');
    Route::get('/admin/{product}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/{product}', [AdminController::class, 'update']);
    Route::delete('/admin/{product}', [AdminController::class, 'destroy']);
    // Route::put('/admin/{product}/restore', [AdminController::class, 'restore']);
});
