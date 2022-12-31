<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(1);
    return inertia::render('Home', [
        'name' => 'mohamadalasaed',
        'posts' => Post::all()->take(4)
    ]);
});

Route::get('/collections/men', [PostController::class, 'index']);
Route::get('/collections/men/{post:slug}', [PostController::class, 'show']);