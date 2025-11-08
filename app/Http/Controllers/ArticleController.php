<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Mail\CommentNotification;
use App\Services\SocialMediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    public function show($slug, SocialMediaService $socialMedia)
    {
        $article = Article::where('slug', $slug)
            ->published()
            ->with(['author', 'category', 'comments' => function($query) {
                $query->where('is_approved', true)->latest();
            }])
            ->firstOrFail();

        $article->incrementViews();

        $related = Article::published()
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->take(4)
            ->get();

        $shareUrls = $socialMedia->generateShareUrls($article);

        return view('articles.show', compact('article', 'shareUrls'))->with('relatedArticles', $related);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $articles = Article::published()
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%")
                  ->orWhere('excerpt', 'like', "%{$query}%");
            })
            ->with(['author', 'category'])
            ->latest('published_at')
            ->paginate(12);

        return view('articles.search', compact('articles', 'query'));
    }

    public function storeComment(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $request->validate([
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|email|max:255',
            'content' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'article_id' => $article->id,
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'content' => $request->content,
            'is_approved' => false,
        ]);

        // Send email notification
        Mail::to('admin@news254.co.ke')->send(new CommentNotification($comment));

        return back()->with('success', 'Comment submitted for review.');
    }
}