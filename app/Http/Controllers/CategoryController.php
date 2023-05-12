<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use ResponseTrait;
    public function index()
    {
        $categories = Category::all();
        return view('pages.categories.index', compact('categories'));
    }

    public function edit($category)
    {
        $category = Category::where('id', $category)->first();
       
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $category)
    {
        $category = Category::where('id', $category)->first();
        $category->update([
            'categories' => $request->categories
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::route('categories.index');
    }

    public function create()
    {
        return view('pages.categories.newCategory');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        Category::create([
            'categories' => $request->category
        ]);

        return Redirect::route('categories.index');
    }

    public function getCategories()
    {
        $categories = Category::get();
        return $this->okResponse('Categories', $categories);
    }
}
