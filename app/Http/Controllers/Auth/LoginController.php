<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['guest']);
    }

    public function index ()
    {
        return view('auth.login');
    }

    public function login (Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ( !auth()->attempt($request->only('email', 'password'), $request->remember) ) {
            return back()->with('status', 'Wrong Email or Password');
        }

        return redirect()->route('home')->with('status', 'You Are Logged In');
    }
}
