<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{

    public function index ($token)
    {
        $email = DB::table('password_resets')->where(['token' => $token])->first();
    
        return view('auth.reset', [
            'email' => $email->email,
            'token' => $token
        ]);
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token

        ])->first();

        if (!$updatePassword) {
            return back()->with('status', 'Invalid token');
        }

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('login')->with('status', 'Password Reset Successfully');

    }
}
