<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function toggle(Request $request)
    {
        $articleId = $request->input('article_id');
        
        // Get bookmarks from session/localStorage (for demo)
        $bookmarks = session('bookmarks', []);
        
        if (in_array($articleId, $bookmarks)) {
            // Remove bookmark
            $bookmarks = array_diff($bookmarks, [$articleId]);
            $bookmarked = false;
            $message = 'Article removed from bookmarks';
        } else {
            // Add bookmark
            $bookmarks[] = $articleId;
            $bookmarked = true;
            $message = 'Article bookmarked successfully';
        }
        
        session(['bookmarks' => array_values($bookmarks)]);
        
        return response()->json([
            'success' => true,
            'bookmarked' => $bookmarked,
            'message' => $message,
            'count' => count($bookmarks)
        ]);
    }
    
    public function index()
    {
        $bookmarkIds = session('bookmarks', []);
        
        if (empty($bookmarkIds)) {
            $articles = collect();
        } else {
            $articles = \App\Models\Article::published()
                ->with(['author', 'category'])
                ->whereIn('id', $bookmarkIds)
                ->latest('published_at')
                ->paginate(12);
        }
        
        return view('bookmarks.index', compact('articles'));
    }
}