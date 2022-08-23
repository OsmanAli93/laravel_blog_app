<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function index ()
    {
        return view('auth.forgot');
    }

    public function store (Request $request, User $user)
    {
        $this->validate($request, [
            'email' => 'email|email'
        ]);

        $user = User::where('email', $request->only('email'))->first();

        if ( $user === null ) {

            return back()->with('status', 'Email does not exists');
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($user)->send(new ResetPassword($request->email, $token));

        return back()->with('status', 'We have sent a reset email link');
    }
}
