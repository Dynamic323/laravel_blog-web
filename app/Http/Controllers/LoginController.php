<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(post $post )
    {
        return view('auth.login', compact('post'));
    }

    public function store(Request $request)
    {
        //    Validate


        $validated = $request->validate([
            'email' => ['required'],
            'password' => ['required']

        ]);
        $remember = $request->has('remember');

        if (!Auth::attempt($validated, $remember)) {
            return redirect()->route('login')->with('error', 'invalid cridentials');
        }

        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'loged in successfuly');
        //   regenerate the session token
        //    redirect
    }

    public function destory(){
        Auth::logout();
        return redirect()->route('home')->with('success' , 'logout successfuly');
    }
}
