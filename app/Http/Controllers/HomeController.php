<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Services\CacheService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(CacheService $cache)
    {
        $featuredArticles = $cache->getFeaturedArticles();
        $latestArticles = $cache->getLatestArticles();
        $trendingArticles = $cache->getTrendingArticles();
        $categories = $cache->getCategories();

        return view('home', compact('featuredArticles', 'latestArticles', 'trendingArticles', 'categories'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function careers()
    {
        return view('pages.careers');
    }
}