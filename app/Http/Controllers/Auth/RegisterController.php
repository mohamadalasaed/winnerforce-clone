<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function create(){
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        User::create($attributes);
    
        return redirect('login');
    }
}
