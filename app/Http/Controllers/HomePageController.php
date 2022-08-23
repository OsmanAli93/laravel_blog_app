<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    public function index ()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(9);

        return view('home', [
            'posts' => $posts
        ]);

    }
}
