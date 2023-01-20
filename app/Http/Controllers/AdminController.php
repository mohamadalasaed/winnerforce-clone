<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class AdminController extends Controller
{
    public function index()
    {
        return inertia::render('Admin/Show', [
            'products' => Product::filter(request(['type', 'search']))->paginate(16)->withQueryString(),
            'filters' => Request::only(['search']),
        ]);
    }

    public function edit(Product $product)
    {
        return Inertia::render('Admin/Edit', [
            'product' => $product
        ]);
    }

    public function update(Product $product)
    {
        $request = \request();
        Request::validate([
            'category_id' => ['required'],
            'title' => ['required'],
            'slug' => ['required'],
            'price' => ['required'],
            'sku' => ['required'],
            'description' => ['required'],
            'size_s' => ['nullable'],
            'size_m' => ['nullable'],
            'size_l' => ['nullable'],
            'size_xl' => ['nullable'],
            'size_xxl' => ['nullable'],
            'img1' => ['required'],
            'img2' => ['required'],
            'img3' => ['nullable'],
            'img4' => ['nullable'],
            'imgs' => ['required'],
            'type' => ['required'],
        ]);
        $product = Product::find($request->id);
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->size_s = $request->size_s;
        $product->size_m = $request->size_m;
        $product->size_l = $request->size_l;
        $product->size_xl = $request->size_xl;
        $product->size_xxl = $request->size_xxl;
        $product->img1 = $request->img1;
        $product->img2 = $request->img2;
        $product->img3 = $request->img3;
        $product->img4 = $request->img4;
        $product->imgs = $request->imgs;
        $product->type = $request->type;
        $product->save();

        return Redirect::back()->with('success', 'product updated.');
    }

    public function destroy(Product $product){
        $id = $product->id;
        
        $product->delete();

        return Redirect('/admin')->with([
            'success' => 'product has been deleted.',
            // 'product_id' => $id
        ]);
    }

    // public function restore(Product $product){
    //     $product->restore();

    //     return Redirect('/admin');
    // }
}
