<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['auth'])->except(['show']);
    }

    public function index ()
    {
        return view('posts.index');
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'thumbnail' => 'required|max:500000',
            'title' => 'required|max:150|unique:posts,title',
            'description' => 'required|max:150',
            'message' => 'required'
        ]);

        $newImageName = time() . '.' . $request->thumbnail->extension();
        $dir = public_path('upload/thumbnails');

        $request->thumbnail->move($dir, $newImageName);

        // Create post
        $request->user()->posts()->create([
            'thumbnail' => $newImageName,
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title, '-'),
            'message' => $request->message
        ]);

        return redirect()->route('home')->with('status', 'Post successfully created');
    }

    public function show ($slug) {

        $post = Post::where('slug', $slug)->first();

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function destroy (Post $post)
    {
        $this->authorize('delete', $post);

        $destination = 'upload/thumbnails/' . $post->thumbnail;

        if (File::exists($destination)) {

            File::delete($destination);
        }

        $post->delete();

        return back()->with('status', 'Post successfully deleted');
    }
}
