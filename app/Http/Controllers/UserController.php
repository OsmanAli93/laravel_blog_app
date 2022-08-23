<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index (User $user)
    {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(9);

        return view('users.user', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
