<?php

namespace App\Http\Controllers;

use App\Http\Helpers\CartHelper;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = CartHelper::getTotal(null);
        $cartItems = Cart::orderBy('id', 'desc')->where('user_id', auth()->user()->id)->with('product')->get();
        return inertia::render('Checkout', compact('cartItems', 'total'));
    }

    public function getProducts(Request $request)
    {
        $user = $request->user();
        $cartItems = CartHelper::getCartItems();
        $total = 0;
        if ($user) {
            $total = CartHelper::getTotal(null);
        } else {
            $total = CartHelper::getTotal($cartItems);
        }
        return response([
            'products' => $cartItems,
            'total' => $total
        ]);
    }

    public function add(Request $request)
    {
        $user = $request->user();
        $product_id = $request->product_id;
        $img = $request->img;
        $title = $request->title;
        $qty = $request->qty;
        $size = $request->size;
        $product = Product::find($product_id);
        if ($user) {
            $product = Product::find($product_id);
            $basket = Cart::where('product_id', $product_id)->where('user_id', $user->id)->where('size', $size)->first();
            if (!$basket) {
                Cart::create([
                    'product_id' => $product_id,
                    'user_id' => $user->id,
                    'size' => $size,
                    'qty' => $qty,
                    'price' => $product->price * $qty,
                ]);
            } else if ($basket && ($basket->size != $size)) {
                Cart::create([
                    'product_id' => $product_id,
                    'user_id' => $user->id,
                    'size' => $size,
                    'qty' => $qty,
                    'price' => $product->price * $qty,
                ]);
            } else {
                $basket->qty += $qty;
                $basket->price += $product->price * $qty;
                $basket->save();
            }
            return response(['total' => CartHelper::getTotal(null)]);
        } else {
            $cartItems = json_decode($request->cookie('cart_items', '[]'), true);
            $productFound = false;
            foreach ($cartItems as &$item) {
                if ($item['product_id'] === $product_id && $item['size'] === $size) {
                    $item['qty'] += $qty;
                    $item['price'] += $product->price * $qty;
                    $productFound = true;
                    break;
                } 
            }
            if (!$productFound) {
                $cartItems[] = [
                    'user_id' => null,
                    'product_id' => $product_id,
                    'qty' => $qty,
                    'size' => $size,
                    'price' => $product->price * $qty,
                    'img' => $img,
                    'title' => $title
                ];
            }
            Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 30);
            return response(['total' => CartHelper::getTotal($cartItems)]);
        }
    }

    public function remove(Request $request)
    {
        $product_id = $request->product_id;
        $size = $request->size;
        $user = $request->user();
        if ($user) {
            $cartItem = Cart::query()->where(['user_id'=>$user->id, 'product_id'=>$product_id, 'size'=>$size])->first();
            if($cartItem){$cartItem->delete();}
            return response(['total' => CartHelper::getTotal(null)]);
        } else {
            $cartItems = json_decode($request->cookie('cart_items', '[]'), true);
            foreach ($cartItems as $i => &$item) {
                if ($item['product_id'] === $product_id && $item['size'] === $size) {
                    array_splice($cartItems, $i, 1);
                    break;
                }
            }
            Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 30);
            return response(['total' => CartHelper::getTotal($cartItems)]);
        }
    }

    public function updateQuantity(Request $request)
    {
        $user = $request->user();
        $product_id = $request->product_id;
        $qty = $request->qty;
        $size = $request->size;
        $product = Product::find($product_id);
        if ($user) {
            $basket = Cart::where('product_id', $product_id)->where('size', $size)->where('user_id', $user->id)->first();
            if ($basket) {
                $basket->qty += $qty;
                $basket->price += $product->price * $qty;
                $basket->save();
            }
            return response(['total' => CartHelper::getTotal(null)]);
        } else {
            $cartItems = json_decode($request->cookie('cart_items', '[]'), true);
            foreach ($cartItems as &$item) {
                if ($item['product_id'] === $product_id && $item['size'] === $size) {
                    $item['qty'] += $qty;
                    $item['price'] += $product->price * $qty;
                    break;
                }
            }
            Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 30);
            return response(['total' => CartHelper::getTotal($cartItems)]);
        }
    }

    public function checkout()
    {
        \Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET'));
        $products = Cart::latest()->where('user_id', auth()->user()->id)->with('product')->get();
        $lineItems = [];
        foreach ($products as $product) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->product->title
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
            'cancel_url' => 'http://localhost:8000',
        ]);
        $url = $session->url;
        return response()->json(["url" => $url,], 200);
    }
}