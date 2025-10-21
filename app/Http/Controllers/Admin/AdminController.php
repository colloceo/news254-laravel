<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Remove constructor middleware - handled by routes

    public function dashboard()
    {
        $stats = [
            'total_articles' => Article::count(),
            'published_articles' => Article::published()->count(),
            'draft_articles' => Article::where('is_draft', true)->count(),
            'total_views' => Article::sum('views'),
            'articles_this_month' => Article::whereMonth('created_at', now()->month)->count(),
            'views_this_month' => Article::whereMonth('updated_at', now()->month)->sum('views'),
            'avg_views_per_article' => Article::avg('views') ?? 0
        ];

        $recentArticles = Article::with(['author', 'category'])
            ->latest()
            ->take(5)
            ->get();

        $pendingComments = Comment::with('article')
            ->where('is_approved', false)
            ->latest()
            ->take(5)
            ->get();

        // Weekly growth calculation
        $lastWeek = Article::where('created_at', '>=', now()->subWeek())->count();
        $previousWeek = Article::where('created_at', '>=', now()->subWeeks(2))
            ->where('created_at', '<', now()->subWeek())->count();
        $weeklyGrowth = $previousWeek > 0 ? (($lastWeek - $previousWeek) / $previousWeek) * 100 : 0;

        $analytics = [
            'weekly_growth' => $weeklyGrowth,
            'engagement_rate' => Comment::count() / max(Article::sum('views'), 1) * 100
        ];

        return view('admin.dashboard', compact('stats', 'recentArticles', 'pendingComments', 'analytics'));
    }

    public function login()
    {
        return view('admin.login');
    }
}