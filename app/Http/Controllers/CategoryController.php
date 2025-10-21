<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $articles = Article::published()
            ->where('category_id', $category->id)
            ->with(['author', 'category'])
            ->latest()
            ->paginate(12);

        return view('categories.show', compact('category', 'articles'));
    }
}