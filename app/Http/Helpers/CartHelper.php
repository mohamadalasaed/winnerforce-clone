<?php

namespace App\Http\Helpers;

use App\Models\Cart;

class CartHelper
{
    public static function getCartItems()
    {
        $request = \request();
        $user = $request->user();
        if ($user) {
            return Cart::where('user_id', auth()->user()->id)
                ->with('product')->get()
                ->map(fn ($item) => [
                    'product_id' => $item->product_id,
                    'qty' => $item->qty,
                    'price' => $item->price,
                    'size' => $item->size,
                    'title' => $item->product->title,
                    'img' => $item->product->img1
                ]);
        } else {
            return self::getCookieCartItems();
        }
    }

    public static function getCookieCartItems()
    {
        $request = \request();
        $carts = json_decode($request->cookie('cart_items', '[]'), true);
        return $carts;
    }

    public static function getTotal($cartItems)
    {
        $request = \request();
        $user = $request->user();
        $total = 0;
        if ($user) {
            return $total = Cart::where('user_id', auth()->user()->id)->sum('price');
        } else {
            foreach ($cartItems as $item) {
                $total += $item['price'];
            }
            return $total;
        }
    }

    public static function moveCartItemsIntoDb()
    {
        $request = \request();
        $cartItems = self::getCookieCartItems();
        $dbCartItems = Cart::where(['user_id' => $request->user()->id])->get()->map(fn ($item) => [
            'id' => $item->product_id . '' . $item->size,
            'product_id' => $item->product_id,
            'qty' => $item->qty,
            'price' => $item->price,
            'size' => $item->size,
        ])->keyBy('id');
        $newCartItems = [];
        foreach ($cartItems as $cartItem) {
            if (isset($dbCartItems[$cartItem['product_id'] . '' . $cartItem['size']])) {
                if ($dbCartItems[$cartItem['product_id'] . '' . $cartItem['size']]['qty'] != $cartItem['qty']) {
                    $product = Cart::where('product_id', $cartItem['product_id'])
                                    ->where('user_id', auth()->user()->id)
                                    ->where('size', $cartItem['size'])
                                    ->with('product')->first();
                    $product->qty = $cartItem['qty'];
                    $product->price = $product->product->price * $cartItem['qty'];
                    $product->save();
                }else{continue;}
            } else {
                $newCartItems[] = [
                    'product_id' => $cartItem['product_id'],
                    'qty' => $cartItem['qty'],
                    'price' => $cartItem['price'],
                    'size' => $cartItem['size'],
                    'user_id' => $request->user()->id
                ];
            }
        }
        if (!empty($newCartItems)) {
            Cart::insert($newCartItems);
        }
    }
}
