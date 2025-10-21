<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Auth handled by routes

    public function index()
    {
        $articles = Article::with(['author', 'category'])
            ->latest()
            ->paginate(15);

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        
        return view('admin.articles.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'required|string|max:500',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'required|url',
            'tags' => 'nullable|string',
            'is_breaking' => 'boolean',
            'is_featured' => 'boolean',
            'is_draft' => 'boolean'
        ]);

        $data = $request->all();
        $data['tags'] = $request->tags ? explode(',', $request->tags) : [];
        $data['published_at'] = $request->is_draft ? null : now();

        $article = Article::create($data);
        
        // Ensure slug is generated
        if (!$article->slug) {
            $article->slug = \Str::slug($article->title);
            $article->save();
        }
        
        // Load relationships for response
        $article->load(['author', 'category']);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Article created successfully!',
                'article' => [
                    'id' => $article->id,
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'excerpt' => $article->excerpt,
                    'featured_image' => $article->featured_image,
                    'author' => $article->author->name,
                    'category' => [
                        'name' => $article->category->name,
                        'color' => $article->category->color ?? '#16A34A'
                    ],
                    'published_at' => $article->published_at ? $article->published_at->diffForHumans() : 'Draft',
                    'is_breaking' => $article->is_breaking,
                    'is_featured' => $article->is_featured,
                    'url' => route('article.show', $article->slug)
                ]
            ]);
        }

        return redirect()->route('admin.articles.show', $article)
            ->with('success', 'Article created successfully!');
    }

    public function show(Article $article)
    {
        $article->load(['comments' => function($query) {
            $query->latest();
        }, 'category', 'author']);
        
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $authors = Author::all();
        
        return view('admin.articles.edit', compact('article', 'categories', 'authors'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'required|string|max:500',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'required|url',
            'tags' => 'nullable|string',
            'is_breaking' => 'boolean',
            'is_featured' => 'boolean',
            'is_draft' => 'boolean'
        ]);

        $data = $request->all();
        $data['tags'] = $request->tags ? explode(',', $request->tags) : [];
        
        if (!$request->is_draft && !$article->published_at) {
            $data['published_at'] = now();
        }

        $article->update($data);
        
        // Ensure slug is updated if title changed
        if ($article->wasChanged('title') && !$article->slug) {
            $article->slug = \Str::slug($article->title);
            $article->save();
        }

        return redirect()->route('admin.articles.show', $article)
            ->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article deleted successfully!');
    }

    public function quickUpdate(Request $request, Article $article)
    {
        $action = $request->input('action');
        
        switch ($action) {
            case 'toggle_featured':
                $article->update(['is_featured' => !$article->is_featured]);
                break;
            case 'toggle_breaking':
                $article->update(['is_breaking' => !$article->is_breaking]);
                break;
            case 'toggle_status':
                $article->update([
                    'is_draft' => !$article->is_draft,
                    'published_at' => $article->is_draft ? now() : null
                ]);
                break;
        }
        
        return response()->json(['success' => true]);
    }
}