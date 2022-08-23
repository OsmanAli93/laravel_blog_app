<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostEditController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['auth']);
    }


    public function index (Post $post)
    {

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function store (Request $request, Post $post)
    {

        $this->authorize('edit', $post);

        if ( $request->file('thumbnail') ) {

            $destination = 'upload/thumbnails/' . $post->thumbnail;

            if (File::exists($destination)) {
    
                File::delete($destination);
            }

            $newImageName = time() . '.' . $request->thumbnail->extension();
            $dir = public_path('upload/thumbnails');
    
            $request->thumbnail->move($dir, $newImageName);

            $post->update([
                'image' => $newImageName,
            ]);
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title, '-'),
            'message' => $request->message,
        ]);
        
        
        return redirect()->route('home')->with('status', 'Post Successfully Edited');
        
    }
}
