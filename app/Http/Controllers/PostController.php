<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\RecentlyDeletedPost;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('published', true)->get();
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
            'category' => 'required',
            'featured_image' => 'required'
        ]);

        if($validator->fails()){
            return back()->withInput()->withErrors(['message' =>'Please input all fields']);
        }

        $image = $this->verifyAndUpload($request, 'featured_image', 'featured_image');


        $posts = Post::create([
            'title' => $request->title,
            'meta_title' => $request->meta_title,
            'slug' => $request->slug,
            'summary' => $request->summary,
            'content' => $request->content,
            'category_id' => $request->category,
            'published' => true,
            'author_id' => Auth::id(),
            'published_at' => Carbon::now(),
            'featured_image_path' => $image,
            'post_id' => uniqid('incub'),
            'feature' => $request->feature == 'on' ? 1 : 0
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
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        $categories = Category::all();
        return view('pages.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('featured_image')) {
            $image = $this->verifyAndUpload($request, 'featured_image', 'featured_image');
        }

        $post->update([
            'categories' => $request->categories,
            'title' => $request->title,
            'meta_tittle' => $request->meta_title,
            'slug' => $request->slug,
            'summary' => $request->summary,
            'featured_image' => $image ?? $post->featured_image_path
        ]);

        return redirect()->route('posts.index')->with('success', 'Article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        RecentlyDeletedPost::create([
            'title' => $post->title,
            'meta_title' => $post->meta_title,
            'slug' => $post->slug,
            'summary' => $post->summary,
            'content' => $post->content,
            'category_id' => $post->category_id,
            'published' => $post->published,
            'author_id' => $post->author_id,
            'published_at' => $post->published_at,
            'featured_image_path' => $post->featured_image_path,
            'post_id' => uniqid('incub')
        ]);

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Article has been deleted');
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
            'category_id' => $request->category,
            'post_id' => uniqid('incub')
        ]);

        return back();
    }

    public function drafts()
    {
        $posts = Post::where('published', false)->get();
        return view('pages.drafts.index', compact('posts'));
    }
    
    public function updateDraft(Post $post)
    {
        $post->update([
            'published' => true
        ]);

        return redirect()->route('posts.draft')->with('success', 'Article has been published');
    }

    public function recentlyDeleted()
    {
        $posts = RecentlyDeletedPost::all();
        return view('pages.posts.recently-deleted', compact('posts'));
    }

    public function restoreDeleted(RecentlyDeletedPost $post)
    {
        $restorePost = Post::insert([
            'title' => $post->title,
            'meta_title' => $post->meta_title,
            'slug' => $post->slug,
            'summary' => $post->summary,
            'content' => $post->content,
            'category_id' => $post->category_id,
            'published' => $post->published,
            'author_id' => $post->author_id,
            'published_at' => $post->published_at,
            'featured_image_path' => $post->featured_image_path,
            'post_id' => $post->post_id
        ]);
        $post->delete();

        return redirect()->route('posts.deleted')->with('success', 'Article has been restored');
    }

    public function upload(Request $request)
    {
        $path = $request->file('file')->store('uploads', 'public');
        return response()->json(['location'=>config('services.env_url.url')."/storage/$path"]);
        
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/

    }
}
