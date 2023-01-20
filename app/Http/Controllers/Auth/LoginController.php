<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CartHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // dd('test');
            $request->session()->regenerate();
            CartHelper::moveCartItemsIntoDb();

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->intended();
    }

    public function reset_passwordView(){
        return Inertia::render('Auth/RecoverPassword');
    }

    // public function reset_password(Request $request){
    //     $request->validate([
    //         'email' => ['required', 'email'],
    //     ]);

    //     $token = Str::length(64);
    //     $domain = URL::to('/');
    //     $url = $domain.'/reset-pass?token='.$token;
        


    //     DB::table('password_resets')->insert([
    //         'email' => $request->email,
    //         'token' => $token,
    //         'created_at' => Carbon::now()
    //     ]);
        // Mail::send('mailforget', ['token' => $token], functionn($message){
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });
    // }
}
