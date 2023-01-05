<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\PostMen;
use App\Models\MenCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

class PostMenController extends Controller
{
    public function index(){
        // sleep(1);
        return inertia::render('MenCards', [
            'posts' => PostMen::oldest()
            ->filter(request(['search', 'category']))
            ->paginate(48)
            ->withQueryString(),
            'categories' => MenCategory::all(),
            'filters' => Request::only(['category','search','page'])
        ]);
    }

    public function show(PostMen $post){
        //  $imgfolder = $post->img_folder;
        //  $size = count(File::files(resource_path("thumbnailsMen/$imgfolder/")));
        return inertia::render('Post', [
            'post' => $post
        ]);
    }
}

