<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_articles' => Article::count(),
            'published_articles' => Article::whereNotNull('published_at')->count(),
            'draft_articles' => Article::whereNull('published_at')->count(),
            'total_comments' => Comment::count(),
            'pending_comments' => Comment::where('is_approved', false)->count(),
            'total_categories' => Category::count(),
            'total_authors' => Author::count(),
        ];

        $recent_articles = Article::with(['author', 'category'])
            ->latest()
            ->take(5)
            ->get();

        $recent_comments = Comment::with('article')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_articles', 'recent_comments'));
    }

    public function quickStats()
    {
        return response()->json([
            'articles' => Article::count(),
            'comments' => Comment::count(),
            'categories' => Category::count(),
            'authors' => Author::count(),
        ]);
    }

    public function bulkActions(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids', []);

        switch ($action) {
            case 'delete_articles':
                Article::whereIn('id', $ids)->delete();
                break;
            case 'publish_articles':
                Article::whereIn('id', $ids)->update(['published_at' => now()]);
                break;
            case 'draft_articles':
                Article::whereIn('id', $ids)->update(['published_at' => null]);
                break;
        }

        return response()->json(['success' => true]);
    }

    public function searchContent(Request $request)
    {
        $query = $request->input('q');
        
        $articles = Article::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->with(['author', 'category'])
            ->take(10)
            ->get();

        return response()->json($articles);
    }
}