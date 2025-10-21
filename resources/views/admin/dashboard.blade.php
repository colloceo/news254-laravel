@extends('layouts.admin')

@section('title', 'Dashboard - News254 Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white">Dashboard</h1>
        <p class="text-gray-400">Welcome to News254 Admin Panel</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-600 bg-opacity-20">
                    <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-400">Total Articles</p>
                    <p class="text-2xl font-semibold text-white">{{ $stats['total_articles'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-600 bg-opacity-20">
                    <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-400">Comments</p>
                    <p class="text-2xl font-semibold text-white">{{ $stats['total_comments'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-600 bg-opacity-20">
                    <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-400">Categories</p>
                    <p class="text-2xl font-semibold text-white">{{ $stats['total_categories'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-600 bg-opacity-20">
                    <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-400">Authors</p>
                    <p class="text-2xl font-semibold text-white">{{ $stats['total_authors'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Articles -->
        <div class="bg-gray-800 rounded-lg border border-gray-700">
            <div class="p-6 border-b border-gray-700">
                <h3 class="text-lg font-semibold text-white">Recent Articles</h3>
            </div>
            <div class="p-6">
                @if($recent_articles->count() > 0)
                    <div class="space-y-4">
                        @foreach($recent_articles as $article)
                        <div class="flex items-center space-x-4">
                            <img src="{{ $article->featured_image }}" alt="{{ $article->title }}" class="w-12 h-12 rounded-lg object-cover">
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-white">{{ Str::limit($article->title, 50) }}</h4>
                                <p class="text-xs text-gray-400">{{ $article->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-400">No articles yet.</p>
                @endif
            </div>
        </div>

        <!-- Recent Comments -->
        <div class="bg-gray-800 rounded-lg border border-gray-700">
            <div class="p-6 border-b border-gray-700">
                <h3 class="text-lg font-semibold text-white">Recent Comments</h3>
            </div>
            <div class="p-6">
                @if($recent_comments->count() > 0)
                    <div class="space-y-4">
                        @foreach($recent_comments as $comment)
                        <div class="border-l-4 border-green-500 pl-4">
                            <p class="text-sm text-gray-300">{{ Str::limit($comment->content, 80) }}</p>
                            <p class="text-xs text-gray-400 mt-1">
                                by {{ $comment->author_name }} on {{ $comment->article->title }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-400">No comments yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection