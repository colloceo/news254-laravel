<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class RssController extends Controller
{
    public function feed()
    {
        $articles = Article::published()->latest()->take(20)->get();
        
        return response()->view('rss.feed', compact('articles'))
                         ->header('Content-Type', 'application/rss+xml');
    }

    public function categoryFeed($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $articles = Article::published()
                          ->where('category_id', $category->id)
                          ->latest()
                          ->take(20)
                          ->get();
        
        return response()->view('rss.category-feed', compact('articles', 'category'))
                         ->header('Content-Type', 'application/rss+xml');
    }
}