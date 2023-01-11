<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $current_user = auth()->user();
        $user_id = $current_user->id;
        $product_id = $request->product_id;
        $qty = $request->qty;
        $size = $request->size;

        $product = Product::find($product_id);

        $basket = Cart::where('product_id', $product_id)->where('user_id', $user_id)->where('size', $size)->first();

        if (!$basket) {
            Cart::create([
                'product_id' => $product_id,
                'user_id' => $user_id,
                'size' => $size,
                'qty' => $qty,
                'price' => $product->price * $qty,
            ]);
        } elseif ($basket && ($basket->size != $size)) {
            Cart::create([
                'product_id' => $product_id,
                'user_id' => $user_id,
                'size' => $size,
                'qty' => $qty,
                'price' => $product->price * $qty,
            ]);
        } else {
            $basket->qty += $qty;
            $basket->price += $product->price * $qty;
            $basket->save();
        }
        return redirect()->intended();
    }

    public function update(Request $request)
    {
        $current_user = auth()->user();
        $user_id = $current_user->id;
        $product_id = $request->product_id;
        $qty = $request->qty;
        $size = $request->size;
        $product = Product::find($product_id);

        $basket = Cart::where('product_id', $product_id)->where('size', $size)->where('user_id', $user_id)->first();

        if($basket ){
            $basket->qty += $qty;
            $basket->price += $product->price * $qty;
            $basket->save();
        }
    }
    // Cart::find($product_id)->where('user_id', $user_id)->increment('qty');

    public function destroy(Request $request)
    {
        $product_id = $request->product_id;
        Cart::destroy($product_id);
        return redirect()->intended();
    }

    public function getCartItems(){
        return Cart::latest()->where('user_id', auth()->user()->id)->with('product')->get();
    }

    public function checkout(){
        \Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET'));
        $products = Cart::latest()->where('user_id', auth()->user()->id)->with('product')->get();
        $lineItems = [];
        foreach ($products as $product) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->product->title,
                    ],
                    'unit_amount' => $product->product->price * 100,
                ],
                'quantity' => $product->qty
            ];
        }
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => 'http://localhost:8000/success',
            'cancel_url' => 'http://localhost:8000/failure',
          ]);
          $url = $session->url;
        //   dd($url);
          return redirect($url);
    }
}
