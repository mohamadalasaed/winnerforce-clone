<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

class ProductsWomenController extends Controller
{
    public function index(){
        // sleep(1);
        return inertia::render('Products', [
            'products' => Product::oldest()->where('type','women')
            ->filter(request(['search', 'category']))
            ->paginate(32)
            ->withQueryString(),
            'categories' => Category::all()->where('type', 'women'),
            'filters' => Request::only(['category','search']),
            'type' => 'women'
        ]);
    }

    public function show(Product $product){
        return inertia::render('Product', [
            'product' => $product,
            'randomProducts' => Product::all()->where('type', 'women')->random(4)
        ]);
    }
}
