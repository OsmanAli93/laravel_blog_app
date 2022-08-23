<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function logout () 
    {
        auth()->logout();

        return redirect()->route('home')->with('status', 'You Have Logged Out');
    }
}
