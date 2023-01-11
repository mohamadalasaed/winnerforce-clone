<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Request;

class ProductsAccessoriesController extends Controller
{
    public function index(){
        // sleep(1);
        return inertia::render('Products', [
            'products' => Product::oldest()->where('type','accessories')
            ->filter(request(['search', 'category']))
            ->paginate(32)
            ->withQueryString(),
            'categories' => Category::all()->where('type', 'accessories'),
            'filters' => Request::only(['category','search','page']),
            'type' => 'accessories'
        ]);
    }

    public function show(Product $product){
        return inertia::render('Product', [
            'product' => $product,
            'randomProducts' => Product::all()->where('type', 'accessories')->random(4),
        ]);
    }
}
