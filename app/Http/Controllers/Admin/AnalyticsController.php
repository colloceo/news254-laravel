<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function index()
    {
        $analytics = [
            'overview' => [
                'total_views' => Article::sum('views'),
                'avg_views_per_article' => Article::avg('views') ?? 0,
                'articles_this_month' => Article::whereMonth('created_at', now()->month)->count(),
            ],
            'engagement' => [
                'engagement_rate' => $this->calculateEngagementRate(),
                'comments_per_article' => Comment::count() / max(Article::count(), 1),
                'approved_comments' => Comment::where('is_approved', true)->count(),
                'pending_comments' => Comment::where('is_approved', false)->count(),
            ],
            'trends' => [
                'weekly_growth' => $this->calculateWeeklyGrowth(),
            ],
            'traffic' => [
                'daily_views' => $this->getDailyViews(),
                'top_articles' => Article::orderBy('views', 'desc')->take(10)->get(),
            ],
            'categories' => Category::withCount('articles')
                ->withSum('articles', 'views')
                ->orderBy('articles_count', 'desc')
                ->get(),
        ];

        return view('admin.analytics.index', compact('analytics'));
    }

    private function getArticlesByMonth()
    {
        return Article::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();
    }

    private function getCommentsByMonth()
    {
        return Comment::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();
    }

    private function getTopCategories()
    {
        return Article::join('categories', 'articles.category_id', '=', 'categories.id')
            ->selectRaw('categories.name, COUNT(*) as count')
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('count')
            ->take(5)
            ->get();
    }

    private function calculateEngagementRate()
    {
        $totalArticles = Article::count();
        $totalComments = Comment::count();
        return $totalArticles > 0 ? ($totalComments / $totalArticles) * 10 : 0;
    }

    private function calculateWeeklyGrowth()
    {
        $thisWeek = Article::where('created_at', '>=', now()->subWeek())->count();
        $lastWeek = Article::whereBetween('created_at', [now()->subWeeks(2), now()->subWeek()])->count();
        return $lastWeek > 0 ? (($thisWeek - $lastWeek) / $lastWeek) * 100 : 0;
    }

    private function getDailyViews()
    {
        return collect(range(29, 0))->map(function($daysAgo) {
            $date = now()->subDays($daysAgo);
            return (object) [
                'date' => $date->format('M j'),
                'views' => Article::whereDate('created_at', $date)->sum('views'),
            ];
        });
    }
}