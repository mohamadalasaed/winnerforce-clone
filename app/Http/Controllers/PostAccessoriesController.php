<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\PostAccessories;
use App\Models\AccessoriesCategory;
use Illuminate\Support\Facades\Request;

class PostAccessoriesController extends Controller
{
    public function index(){
        // sleep(1);
        return inertia::render('AccessoriesCards', [
            'posts' => PostAccessories::oldest()
            ->filter(request(['search', 'category']))
            ->paginate(16)
            ->withQueryString(),
            'categories' => AccessoriesCategory::all(),
            'filters' => Request::only(['category','search','page'])
        ]);
    }

    public function show(PostAccessories $post){
        return inertia::render('Post', [
            'post' => $post,
            'type' => 'accessories'
        ]);
    }
}
