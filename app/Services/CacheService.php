<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\Article;
use App\Models\Category;

class CacheService
{
    public function getArticles($key, $callback, $minutes = 60)
    {
        return Cache::remember($key, now()->addMinutes($minutes), $callback);
    }

    public function getFeaturedArticles()
    {
        return $this->getArticles('featured_articles', function() {
            return Article::published()->featured()->latest()->take(6)->get();
        });
    }

    public function getLatestArticles()
    {
        return $this->getArticles('latest_articles', function() {
            return Article::published()->latest()->take(12)->get();
        });
    }

    public function getTrendingArticles()
    {
        return $this->getArticles('trending_articles', function() {
            // First try admin-selected trending articles
            $adminTrending = Article::published()->trending()->latest()->take(5)->get();
            
            // If not enough admin-selected, fill with most viewed
            if ($adminTrending->count() < 5) {
                $needed = 5 - $adminTrending->count();
                $viewBased = Article::published()
                    ->where('is_trending', false)
                    ->orderBy('views', 'desc')
                    ->take($needed)
                    ->get();
                
                return $adminTrending->merge($viewBased);
            }
            
            return $adminTrending;
        }, 30);
    }

    public function getCategories()
    {
        return Cache::remember('categories_with_count', now()->addHours(2), function() {
            return Category::withCount('articles')->get();
        });
    }

    public function clearArticleCache()
    {
        Cache::forget('featured_articles');
        Cache::forget('latest_articles');
        Cache::forget('trending_articles');
        Cache::forget('categories_with_count');
    }

    public function warmCache()
    {
        $this->getFeaturedArticles();
        $this->getLatestArticles();
        $this->getTrendingArticles();
        $this->getCategories();
    }
}