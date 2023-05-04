<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\PostPreview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostPreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
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


        $data = [
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
        ];
        Post::create($data);
        return redirect()->route('display', [$data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PostPreview $postPreview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostPreview $postPreview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostPreview $postPreview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostPreview $postPreview)
    {
        //
    }
}
