<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

class ProductsMenController extends Controller
{
    public function index(){
        // sleep(1);
        return inertia::render('Products', [
            'products' => Product::oldest()->where('type','men')
            ->filter(request(['search', 'category']))
            ->paginate(32)
            ->withQueryString(),
            'categories' => Category::all()->where('type', 'men'),
            'filters' => Request::only(['category','search','page']),
            'type' => 'men'
        ]);
    }

    public function show(Product $product){
        return inertia::render('Product', [
            'product' => $product,
            'randomProducts' => Product::all()->where('type', 'men')->random(4),
        ]);
    }
}

