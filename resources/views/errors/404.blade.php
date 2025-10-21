@extends('layouts.app')

@section('title', '404 - Page Not Found | News254')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-900 flex items-center justify-center px-4">
    <div class="max-w-lg mx-auto text-center">
        <!-- Error Illustration -->
        <div class="mb-8">
            <svg class="w-32 h-32 mx-auto text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
        </div>

        <!-- Error Code -->
        <div class="mb-6">
            <h1 class="text-6xl font-bold text-gray-900 dark:text-white mb-2">404</h1>
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Page Not Found</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8">
                Sorry, we couldn't find the page you're looking for. The article or page may have been moved, deleted, or the URL might be incorrect.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex sm:justify-center">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Go Home
            </a>
            <button onclick="history.back()" 
                    class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Go Back
            </button>
        </div>

        <!-- Search Box -->
        <div class="mt-8">
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Or search for what you're looking for:</p>
            <form action="{{ route('article.search') }}" method="GET" class="max-w-md mx-auto">
                <div class="flex">
                    <input type="text" name="q" placeholder="Search articles..." 
                           class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-lg focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                    <button type="submit" 
                            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-r-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Popular Links -->
        <div class="mt-12">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Popular Sections</h3>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <a href="{{ route('category.show', 'politics') }}" class="text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300">
                    🏛️ Politics
                </a>
                <a href="{{ route('category.show', 'business') }}" class="text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300">
                    💼 Business
                </a>
                <a href="{{ route('category.show', 'technology') }}" class="text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300">
                    💻 Technology
                </a>
                <a href="{{ route('category.show', 'sports') }}" class="text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300">
                    ⚽ Sports
                </a>
            </div>
        </div>
    </div>
</div>
@endsection