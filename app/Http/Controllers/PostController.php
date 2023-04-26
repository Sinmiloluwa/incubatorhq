<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('pages.posts.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.posts.newPost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'meta_title' => 'required',
            'slug' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);

        if($validator->fails()){
            return response($validator->messages(), 200);
        }

        $posts = Post::create([
            'title' => $request->title,
            'meta_title' => $request->meta_title,
            'slug' => $request->slug,
            'summary' => $request->summary,
            'content' => $request->content,
            'category_id' => $request->category,
            'published' => true,
            'author_id' => Auth::id(),
            'published_at' => Carbon::now()
        ]);

        return redirect()->route('posts.index')->with('message', 'Article has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function draft(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'slug' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'meta_title' => $request->meta_title,
            'slug' => $request->slug,
            'summary' => $request->summary,
            'content' => $request->content,
            'category_id' => $request->category
        ]);

        return back();
    }
}
