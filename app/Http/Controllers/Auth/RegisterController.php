<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['guest']);
    }

    public function index ()
    {
        return view('auth.register');
    }

    public function store (Request $request)
    {
        // Validate form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // Store User
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Create relationship between user and profile
        $user->profile()->create([
            'user_id' => $user->id,
        ]);

        // Sign in user
        auth()->attempt($request->only('email', 'password'));

        // Redirect
        return redirect()->route('profile')->with('status', 'User Created');
        
    }
}
