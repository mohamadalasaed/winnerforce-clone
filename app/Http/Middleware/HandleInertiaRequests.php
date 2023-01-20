<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => Auth::user() ? [
                'user' => [
                    'firstname' => Auth::user()->firstname,
                    'email' => Auth::user()->email
                    // 'products' => Cart::where('user_id', auth()->user()->id)->with('post_men')->get()
                    // 'cart' => $request->json()->all()
                ]
            ] : null,
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                    // 'product_id' => $request->session()->get('product_id'),
                    'error' => $request->session()->get('error'),
                ];
            },
            // 'can' => [
            //     'admin' => Auth::user()->can('admin', User::class)
            // ],
        ]);
    }
}
