<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $posts = Post::latest('page_views')->get();
        return view('welcome', compact('posts'));
    }
}
