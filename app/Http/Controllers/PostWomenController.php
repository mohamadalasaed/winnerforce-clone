<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\PostWomen;
use App\Models\WomenCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

class PostWomenController extends Controller
{
    public function index(){
        // sleep(1);
        return inertia::render('WomenCards', [
            'posts'  => PostWomen::oldest()
            ->filter(request(['search', 'category']))
             ->paginate(40)
            ->withQueryString(),
            'categories' => WomenCategory::all(),
            'filters' => Request::only(['category','search','page'])
        ]);
    }

    public function show(PostWomen $post){
        return inertia::render('Post', [
            'post' => $post
        ]);
    }
}
