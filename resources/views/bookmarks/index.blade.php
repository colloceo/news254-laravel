@extends('layouts.app')

@section('title', 'My Bookmarks - News254')
@section('description', 'Your saved articles on News254 - Kenya\'s premier news platform.')

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
                    <span class="ml-1 text-gray-500 dark:text-gray-400">My Bookmarks</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-black dark:text-white mb-2">My Bookmarks</h1>
            <p class="text-gray-600 dark:text-gray-400">
                {{ $articles->total() }} {{ Str::plural('article', $articles->total()) }} saved
            </p>
        </div>
        
        @if($articles->count() > 0)
        <button onclick="clearAllBookmarks()" 
                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
            Clear All
        </button>
        @endif
    </div>

    @if($articles->count() > 0)
        <!-- Bookmarked Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
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
                    <button onclick="toggleBookmark({{ $article->id }}, this)" 
                            class="absolute top-3 right-3 bg-white bg-opacity-90 p-2 rounded-full hover:bg-opacity-100 transition-all bookmark-btn bookmarked"
                            title="Remove from bookmarks">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v13.586l-6-6-6 6V4z"></path>
                        </svg>
                    </button>
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
                        <span>{{ $article->published_at->diffForHumans() }}</span>
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
        <!-- No Bookmarks -->
        <div class="text-center py-12">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
            </svg>
            <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-2">No bookmarks yet</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-6">
                Start bookmarking articles you want to read later. Look for the bookmark icon on articles.
            </p>
            <a href="{{ route('home') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                Browse Articles
            </a>
        </div>
    @endif
</div>

@push('scripts')
<script>
function toggleBookmark(articleId, button) {
    fetch('/bookmarks/toggle', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ article_id: articleId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            button.closest('article').remove();
            
            const remainingArticles = document.querySelectorAll('article').length;
            if (remainingArticles === 0) {
                location.reload();
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function clearAllBookmarks() {
    if (confirm('Are you sure you want to remove all bookmarks?')) {
        fetch('/bookmarks/clear', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(() => {
            location.reload();
        });
    }
}
</script>
@endpush
@endsection