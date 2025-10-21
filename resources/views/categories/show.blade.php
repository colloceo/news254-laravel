@extends('layouts.app')

@section('title', $category->name . ' News - News254')
@section('description', 'Latest ' . strtolower($category->name) . ' news and updates from Kenya and around the world.')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Category Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-4 mb-4">
            <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-black dark:text-white">{{ $category->name }}</h1>
                <p class="text-gray-600 dark:text-gray-300">Latest {{ strtolower($category->name) }} news and updates</p>
            </div>
        </div>
        
        @if($category->description)
        <p class="text-gray-700 dark:text-gray-300 max-w-3xl">{{ $category->description }}</p>
        @endif
    </div>

    <!-- Articles Grid -->
    @if($articles->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($articles as $article)
        <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="relative">
                <img src="{{ $article->featured_image }}" 
                     alt="{{ $article->title }}"
                     class="w-full h-48 object-cover">
                <div class="absolute top-3 left-3">
                    <span class="bg-green-600 text-white px-2 py-1 rounded text-sm">
                        {{ $article->category->name }}
                    </span>
                </div>
                @if($article->is_breaking)
                <div class="absolute top-3 right-3">
                    <span class="bg-red-600 text-white px-2 py-1 rounded text-sm font-bold animate-pulse">
                        BREAKING
                    </span>
                </div>
                @endif
                @if($article->is_featured)
                <div class="absolute bottom-3 right-3">
                    <span class="bg-blue-600 text-white px-2 py-1 rounded text-sm">
                        Featured
                    </span>
                </div>
                @endif
            </div>
            <div class="p-6">
                <h2 class="font-bold text-black dark:text-white mb-3 line-clamp-2 hover:text-green-600 dark:hover:text-green-400">
                    <a href="{{ route('article.show', $article->slug) }}">
                        {{ $article->title }}
                    </a>
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">{{ $article->excerpt }}</p>
                <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                    <div class="flex items-center space-x-2">
                        <img src="{{ $article->author->avatar }}" 
                             alt="{{ $article->author->name }}"
                             class="w-6 h-6 rounded-full">
                        <span>{{ $article->author->name }}</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span>{{ $article->published_at->diffForHumans() }}</span>
                        <span>{{ $article->views }} views</span>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $articles->links() }}
    </div>
    @else
    <!-- No Articles -->
    <div class="text-center py-12">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-black dark:text-white mb-2">No Articles Yet</h2>
        <p class="text-gray-600 dark:text-gray-300 mb-6">We haven't published any {{ strtolower($category->name) }} articles yet. Check back soon!</p>
        <a href="{{ route('home') }}" 
           class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
            Browse All News
        </a>
    </div>
    @endif

    <!-- Related Categories -->
    <div class="mt-12 bg-gray-50 dark:bg-gray-800 rounded-lg p-8">
        <h3 class="text-xl font-bold text-black dark:text-white mb-6">Explore Other Categories</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <a href="{{ route('category.show', 'politics') }}" 
               class="bg-white dark:bg-gray-700 rounded-lg p-4 text-center hover:shadow-md transition-shadow {{ $category->slug === 'politics' ? 'ring-2 ring-green-600' : '' }}">
                <div class="w-8 h-8 bg-red-600 rounded-full mx-auto mb-2"></div>
                <span class="text-sm font-medium text-black dark:text-white">Politics</span>
            </a>
            <a href="{{ route('category.show', 'business') }}" 
               class="bg-white dark:bg-gray-700 rounded-lg p-4 text-center hover:shadow-md transition-shadow {{ $category->slug === 'business' ? 'ring-2 ring-green-600' : '' }}">
                <div class="w-8 h-8 bg-green-600 rounded-full mx-auto mb-2"></div>
                <span class="text-sm font-medium text-black dark:text-white">Business</span>
            </a>
            <a href="{{ route('category.show', 'technology') }}" 
               class="bg-white dark:bg-gray-700 rounded-lg p-4 text-center hover:shadow-md transition-shadow {{ $category->slug === 'technology' ? 'ring-2 ring-green-600' : '' }}">
                <div class="w-8 h-8 bg-purple-600 rounded-full mx-auto mb-2"></div>
                <span class="text-sm font-medium text-black dark:text-white">Technology</span>
            </a>
            <a href="{{ route('category.show', 'sports') }}" 
               class="bg-white dark:bg-gray-700 rounded-lg p-4 text-center hover:shadow-md transition-shadow {{ $category->slug === 'sports' ? 'ring-2 ring-green-600' : '' }}">
                <div class="w-8 h-8 bg-orange-600 rounded-full mx-auto mb-2"></div>
                <span class="text-sm font-medium text-black dark:text-white">Sports</span>
            </a>
            <a href="{{ route('category.show', 'entertainment') }}" 
               class="bg-white dark:bg-gray-700 rounded-lg p-4 text-center hover:shadow-md transition-shadow {{ $category->slug === 'entertainment' ? 'ring-2 ring-green-600' : '' }}">
                <div class="w-8 h-8 bg-pink-600 rounded-full mx-auto mb-2"></div>
                <span class="text-sm font-medium text-black dark:text-white">Entertainment</span>
            </a>
            <a href="{{ route('category.show', 'lifestyle') }}" 
               class="bg-white dark:bg-gray-700 rounded-lg p-4 text-center hover:shadow-md transition-shadow {{ $category->slug === 'lifestyle' ? 'ring-2 ring-green-600' : '' }}">
                <div class="w-8 h-8 bg-blue-600 rounded-full mx-auto mb-2"></div>
                <span class="text-sm font-medium text-black dark:text-white">Lifestyle</span>
            </a>
        </div>
    </div>
</div>
@endsection