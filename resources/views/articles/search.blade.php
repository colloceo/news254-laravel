@extends('layouts.app')

@section('title', 'Search Results' . ($query ? ' for "' . $query . '"' : '') . ' - News254')
@section('description', 'Search results for news articles on News254 - Kenya\'s premier news platform.')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Search Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-black dark:text-white mb-4">
            @if($query)
                Search Results for "{{ $query }}"
            @else
                Search Articles
            @endif
        </h1>
        
        @if($query)
        <p class="text-gray-600 dark:text-gray-400">
            {{ $articles->total() }} {{ Str::plural('article', $articles->total()) }} found
        </p>
        @endif
    </div>

    @if($articles->count() > 0)
        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($articles as $article)
            <a href="{{ route('article.show', $article->slug) }}" class="block">
                <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="relative image-container h-48">
                        <img src="{{ $article->featured_image }}" 
                             alt="{{ $article->title }}"
                             class="w-full h-full object-cover object-center hover:opacity-90 transition-opacity">
                        <div class="absolute top-3 left-3">
                            <span class="text-white px-2 py-1 rounded text-sm" style="background-color: {{ $article->category->color ?? '#16A34A' }}">
                                {{ $article->category->name }}
                            </span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-black dark:text-white mb-2 line-clamp-2 hover:text-green-600 dark:hover:text-green-400">
                            {{ $article->title }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2">{{ $article->excerpt }}</p>
                        <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                            <span>{{ $article->author->name }}</span>
                            <span>{{ $article->published_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </article>
            </a>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $articles->appends(['q' => $query])->links() }}
        </div>
    @else
        <!-- No Results -->
        <div class="text-center py-12">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-2">No articles found</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-6">
                @if($query)
                    No articles match your search for "{{ $query }}". Try different keywords.
                @else
                    Enter a search term to find articles.
                @endif
            </p>
            <a href="{{ route('home') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                Back to Home
            </a>
        </div>
    @endif
</div>
@endsection