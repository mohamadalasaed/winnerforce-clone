<?php

use App\Http\Controllers\PostMenController;
use App\Http\Controllers\PostWomenController;
use App\Http\Controllers\PostAccessoriesController;
use App\Models\PostMen;
use App\Models\PostWomen;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(1);
    return inertia::render('Home', [
        'name' => 'mohamadalasaed',
        'postsmen' => PostMen::all()->take(4),
        'postswomen' => PostWomen::all()->take(4),
        'post' => PostMen::all()->take(1)
    ]);
});

Route::get('/collections/men', [PostMenController::class, 'index']);
Route::get('/collections/men/{post:slug}', [PostMenController::class, 'show']);

Route::get('/collections/women', [PostWomenController::class, 'index']);
Route::get('/collections/women/{post:slug}', [PostWomenController::class, 'show']);

Route::get('/collections/accessories', [PostAccessoriesController::class, 'index']);
Route::get('/collections/accessories/{post:slug}', [PostAccessoriesController::class, 'show']);

Route::get('/login', function () {
    return inertia::render(('Login'));
});

Route::get('/register', function () {
    return inertia::render(('Register'));
});

