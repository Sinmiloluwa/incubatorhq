<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
        dd($category);
    }
}
