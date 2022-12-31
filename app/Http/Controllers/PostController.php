<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\MenCategory;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    public function index(){
        // sleep(1);
        return inertia::render('MenCards', [
            'posts' => Post::latest()
            ->filter(request(['search', 'category']))
            ->paginate(8)
            ->withQueryString(),
            'categories' => MenCategory::all(),
            'filters' => Request::only(['category','search','page'])
        ]);
    }

    public function show(Post $post){
        return inertia::render('Post', [
            'post' => $post
        ]);
    }
}
