@extends('layouts.app')

@section('title', 'Search Results' . ($query ? ' for "' . $query . '"' : '') . ' - News254')
@section('description', 'Search results for news articles on News254 - Kenya\'s premier news platform.')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-gray-500 dark:text-gray-400">Search Results</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Advanced Search Filters -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 sticky top-32">
                <h3 class="text-lg font-bold text-black dark:text-white mb-4">Advanced Search</h3>
                
                <form action="{{ route('article.search') }}" method="GET" class="space-y-4">
                    <!-- Search Query -->
                    <div>
                        <label for="q" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Keywords</label>
                        <input type="text" id="q" name="q" value="{{ $query }}" 
                               placeholder="Search articles..."
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white text-sm">
                    </div>
                    
                    <!-- Category Filter -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                        <select id="category" name="category" 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white text-sm">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}" {{ $category == $cat->slug ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Author Filter -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Author</label>
                        <select id="author" name="author" 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white text-sm">
                            <option value="">All Authors</option>
                            @foreach($authors as $auth)
                            <option value="{{ $auth->slug }}" {{ $author == $auth->slug ? 'selected' : '' }}>
                                {{ $auth->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Date Range -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Date Range</label>
                        <div class="space-y-2">
                            <input type="date" name="date_from" value="{{ $dateFrom }}" 
                                   placeholder="From date"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white text-sm">
                            <input type="date" name="date_to" value="{{ $dateTo }}" 
                                   placeholder="To date"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white text-sm">
                        </div>
                    </div>
                    
                    <!-- Sort By -->
                    <div>
                        <label for="sort_by" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Sort By</label>
                        <select id="sort_by" name="sort_by" 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white text-sm">
                            <option value="latest" {{ $sortBy == 'latest' ? 'selected' : '' }}>Latest First</option>
                            <option value="oldest" {{ $sortBy == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                            <option value="popular" {{ $sortBy == 'popular' ? 'selected' : '' }}>Most Popular</option>
                            <option value="title" {{ $sortBy == 'title' ? 'selected' : '' }}>Title A-Z</option>
                        </select>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button type="submit" class="flex-1 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm">
                            Search
                        </button>
                        <a href="{{ route('article.search') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors text-sm">
                            Clear
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Search Results -->
        <div class="lg:col-span-3">
            <!-- Results Header -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-black dark:text-white mb-2">
                        @if($query)
                            Search Results for "{{ $query }}"
                        @else
                            All Articles
                        @endif
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ $articles->total() }} {{ Str::plural('article', $articles->total()) }} found
                    </p>
                </div>
                
                <!-- Quick Sort (Mobile) -->
                <div class="mt-4 sm:mt-0">
                    <select onchange="quickSort(this.value)" 
                            class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white text-sm">
                        <option value="latest" {{ $sortBy == 'latest' ? 'selected' : '' }}>Latest First</option>
                        <option value="popular" {{ $sortBy == 'popular' ? 'selected' : '' }}>Most Popular</option>
                        <option value="title" {{ $sortBy == 'title' ? 'selected' : '' }}>Title A-Z</option>
                    </select>
                </div>
            </div>
            
            @if($articles->count() > 0)
                <!-- Articles Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    @foreach($articles as $article)
                    <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative image-container h-48">
                            <img src="{{ $article->featured_image }}" 
                                 alt="{{ $article->title }}"
                                 class="w-full h-full object-cover object-center">
                            <div class="absolute top-3 left-3">
                                <span class="text-white px-2 py-1 rounded text-sm" style="background-color: {{ $article->category->color ?? '#16A34A' }}">
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
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-black dark:text-white mb-2 line-clamp-2 hover:text-green-600 dark:hover:text-green-400">
                                <a href="{{ route('article.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2">{{ $article->excerpt }}</p>
                            <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                                <div class="flex items-center space-x-2">
                                    <img src="{{ $article->author->avatar }}" 
                                         alt="{{ $article->author->name }}"
                                         class="w-5 h-5 rounded-full">
                                    <span>{{ $article->author->name }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span>{{ $article->published_at->diffForHumans() }}</span>
                                    <span>•</span>
                                    <span>{{ $article->views }} views</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-center">
                    {{ $articles->links() }}
                </div>
            @else
                <!-- No Results -->
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No articles found</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-4">
                        @if($query)
                            No articles match your search for "{{ $query }}". Try different keywords or adjust your filters.
                        @else
                            No articles match your current filters. Try adjusting your search criteria.
                        @endif
                    </p>
                    <a href="{{ route('article.search') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                        Clear All Filters
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
function quickSort(sortBy) {
    const url = new URL(window.location);
    url.searchParams.set('sort_by', sortBy);
    window.location.href = url.toString();
}
</script>
@endpush
@endsection