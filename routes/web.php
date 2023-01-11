<?php

use App\Http\Controllers\ProductsMenController;
use App\Http\Controllers\ProductsWomenController;
use App\Http\Controllers\ProductsAccessoriesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(1);
    return inertia::render('Home', [
        'productsMen' => Product::all()->where('type', 'men')->take(4),
        'productsWomen' => Product::all()->where('type', 'women')->take(4),
        'product' => Product::all()->where('type', 'men')->take(1)
    ]);
});

Route::get('/checkouts', function () {
    return inertia::render('Checkout', [
        // 'products' => Cart::latest()->where('user_id', auth()->user()->id)->with('product')->get(),
        // 'total' => Cart::where('user_id', auth()->user()->id)->sum('price')
    ]);
})->middleware('auth')->name('login');



Route::get('/collections/men', [ProductsMenController::class, 'index']);
Route::get('/collections/men/{product:slug}', [ProductsMenController::class, 'show']);

Route::get('/collections/women', [ProductsWomenController::class, 'index']);
Route::get('/collections/women/{product:slug}', [ProductsWomenController::class, 'show']);

Route::get('/collections/accessories', [ProductsAccessoriesController::class, 'index']);
Route::get('/collections/accessories/{product:slug}', [ProductsAccessoriesController::class, 'show']);

Route::get('login', [LoginController::class, 'index'])->middleware('guest');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/cart-store', [CartController::class, 'store'])->middleware('auth');
Route::post('/cart-update', [CartController::class, 'update'])->middleware('auth');
Route::post('/cart-delete', [CartController::class, 'destroy'])->middleware('auth');
Route::post('/cart-checkout', [CartController::class, 'checkout'])->middleware('auth','api','cors');

Route::get('/getproducts', function () {
    // sleep(1);
    $products = Cart::latest()->where('user_id', auth()->user()->id)->with('product')->get();
    $total = Cart::where('user_id', auth()->user()->id)->sum('price');
    return response()->json([
        "products" => $products,
        'total' => $total

], 200);
})->middleware('auth');