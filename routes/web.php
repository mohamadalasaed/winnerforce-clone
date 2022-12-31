<?php

use App\Models\MenCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Post;

Route::get('/', function () {
    return inertia::render('Home', [
        'name' => 'mohamadalasaed'
    ]);
});

// Route::get('/collections/men', function () {
//    // sleep(1);
//     return inertia::render('MenCards', [
//         'posts' => Post::paginate(12)
//     ]);
// });

// Route::get('/collections/men', function () {
//     return Inertia::render('MenCards', [
//         'posts' => Post::paginate(12)->filter(request(['search', 'category'])),
//         'categories' => MenCategory::all()
//     ]);
// });



Route::get('/collections/men', function () {
    return Inertia::render('MenCards', [
        'posts' => Post::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->paginate(12),
        'filters' => Request::only(['search']),
        'categories' => MenCategory::all()
    ]);
});
