<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function recentArticles()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(9)->get();
        return PostResource::collection($posts);
    }

    public function featurePostHero()
    {
        $featuredPost = Post::where('feature', true)->orderBy('created_at', 'desc')->take(4)->get();
        return PostResource::collection($featuredPost);
    }

    public function getAllFeaturedPosts()
    {
        $featuredPosts = Post::where('feature', true)->orderBy('created_at', 'desc')->get();
        return PostResource::collection($featuredPosts);
    }
}
