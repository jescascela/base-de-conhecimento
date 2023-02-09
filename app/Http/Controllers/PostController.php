<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts/list', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store(Request $request)
    {
        $post = $request->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);
        $input = $request->all();
        Post::create($input);
        return redirect()->back();
    }

    public function show(Post $post)
    {
        return view('display', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts/edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $input = $request->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return view('display', compact('post'));
    }
}
