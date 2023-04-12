<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|stringaa|max:255',
            'note' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category_id' => 'required|exists:App\Models\Category,id'
        ]);
        Post::create([
            'title' => $request->title,
            'note' => $request->note,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('posts.index')->with('msg', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'note' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id',
            ]);
            $post->title = $request->title;
            $post->note = $request->note;
            $post->description = $request->description;
            $post->category_id = $request->category_id;
            $post->save();
            return redirect()->route('posts.index')->with('msg', 'Post Updated Successfully');

            $request->validate([
                'title' => 'required|string|max:255',
                'note' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'category_id' => 'required|exists:App\Models\Category,id'
            ]);
            Post::create([
                'title' => $request->title,
                'note' => $request->note,
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('posts.index')->with('msg', 'Post Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('msg', 'Post Delete Successfully');
    }
}
