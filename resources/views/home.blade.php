@extends('layouts.app')

@section('title', 'News254 - Kenya\'s Premier News Platform')
@section('description', 'Stay informed with News254 - Kenya\'s leading source for politics, business, technology, sports, and entertainment news.')

@section('content')
<!-- Breaking News Bar -->
@if(isset($breakingNews) && $breakingNews)
<div class="bg-red-600 text-white py-2 px-4 mb-6 rounded-lg flex items-center breaking-pulse">
    <span class="font-bold mr-3 flex items-center">
        <i class="fas fa-bolt mr-1"></i> BREAKING:
    </span>
    <div class="overflow-hidden">
        <div class="animate-marquee whitespace-nowrap">
            <a href="{{ route('article.show', $breakingNews->slug) }}" class="hover:underline mr-8">
                {{ $breakingNews->title }}
            </a>
        </div>
    </div>
</div>
@endif

<!-- Hero Section -->
@if($featuredArticles->count() > 0)
    <section class="mb-8 sm:mb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-8">
            <!-- Main Featured Article -->
            <div class="lg:col-span-1">
                @php $mainArticle = $featuredArticles->first() @endphp
                <article class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden article-card">
                    <div class="relative image-container h-48 sm:h-64">
                        <a href="{{ route('article.show', $mainArticle->slug) }}">
                            <img src="{{ $mainArticle->featured_image }}" 
                                 alt="{{ $mainArticle->title }}"
                                 class="w-full h-full object-cover object-center hover:opacity-90 transition-opacity cursor-pointer">
                        </a>
                        <div class="absolute top-2 left-2 sm:top-4 sm:left-4">
                            <span class="text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs sm:text-sm font-medium" style="background-color: {{ $mainArticle->category->color ?? '#16A34A' }}">
                                {{ $mainArticle->category->name }}
                            </span>
                        </div>
                        @if($mainArticle->is_breaking)
                        <div class="absolute top-2 right-2 sm:top-4 sm:right-4">
                            <span class="bg-red-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs sm:text-sm font-bold breaking-pulse">
                                BREAKING
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="p-4 sm:p-6">
                        <h1 class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white mb-3 hover:text-green-600 dark:hover:text-green-400">
                            <a href="{{ route('article.show', $mainArticle->slug) }}"
                               data-preview="true"
                               data-title="{{ $mainArticle->title }}"
                               data-excerpt="{{ Str::limit($mainArticle->excerpt, 120) }}"
                               data-author="{{ $mainArticle->author->name }}"
                               data-date="{{ $mainArticle->published_at->format('M j, Y') }}">
                                {{ $mainArticle->title }}
                            </a>
                        </h1>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3 text-sm sm:text-base">{{ $mainArticle->excerpt }}</p>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between text-xs sm:text-sm text-gray-500 dark:text-gray-400 space-y-2 sm:space-y-0">
                            <div class="flex items-center space-x-2">
                                <img src="{{ $mainArticle->author->avatar }}" 
                                     alt="{{ $mainArticle->author->name }}"
                                     class="w-6 h-6 sm:w-8 sm:h-8 rounded-full">
                                <span>{{ $mainArticle->author->name }}</span>
                            </div>
                            <div class="flex items-center space-x-2 sm:space-x-4">
                                <span>{{ $mainArticle->published_at->diffForHumans() }}</span>
                                <span class="hidden sm:inline">{{ $mainArticle->read_time }} min read</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Side Featured Articles -->
            <div class="space-y-4 sm:space-y-6">
                @foreach($featuredArticles->skip(1) as $article)
                <a href="{{ route('article.show', $article->slug) }}" class="block">
                    <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all article-card">
                        <div class="flex">
                            <div class="image-container w-24 h-20 sm:w-32 sm:h-24 flex-shrink-0 rounded">
                                <img src="{{ $article->featured_image }}" 
                                     alt="{{ $article->title }}"
                                     class="w-full h-full object-cover object-center hover:opacity-90 transition-opacity">
                            </div>
                            <div class="p-3 sm:p-4 flex-1">
                                <div class="flex items-center mb-2">
                                    <span class="text-white px-2 py-1 rounded text-xs" style="background-color: {{ $article->category->color ?? '#16A34A' }}">
                                        {{ $article->category->name }}
                                    </span>
                                </div>
                                <h3 class="font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2 hover:text-green-600 dark:hover:text-green-400 text-sm sm:text-base">
                                    {{ $article->title }}
                                </h3>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $article->published_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </article>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

<!-- Ad Banner -->
<div class="mb-8">
    <div class="bg-gray-100 dark:bg-gray-800 h-24 flex items-center justify-center text-gray-500 rounded-lg">
        <div class="text-center">
            <p class="text-sm">Advertisement</p>
            <p class="text-xs mt-1">Your ad could be here</p>
        </div>
    </div>
</div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Latest News -->
            <section class="mb-8">
                <h2 class="text-2xl font-bold text-black dark:text-white mb-6 border-b-2 border-green-600 pb-2">Latest News</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($latestArticles as $article)
                    <a href="{{ route('article.show', $article->slug) }}" class="block">
                        <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all article-card">
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
            </section>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Trending Articles -->
            @if($trendingArticles->count() > 0)
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold text-black dark:text-white mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">Trending</h3>
                <div class="space-y-4">
                    @foreach($trendingArticles as $index => $article)
                    <article class="flex items-start space-x-3">
                        <span class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold">
                            {{ $index + 1 }}
                        </span>
                        <div class="flex-1">
                            <h4 class="font-medium text-black dark:text-white line-clamp-2 hover:text-green-600 dark:hover:text-green-400">
                                <a href="{{ route('article.show', $article->slug) }}"
                                   data-preview="true"
                                   data-title="{{ $article->title }}"
                                   data-excerpt="{{ Str::limit($article->excerpt, 120) }}"
                                   data-author="{{ $article->author->name }}"
                                   data-date="{{ $article->published_at->format('M j, Y') }}">
                                    {{ $article->title }}
                                </a>
                            </h4>
                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                {{ $article->views }} views • {{ $article->published_at->diffForHumans() }}
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Categories -->
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold text-black dark:text-white mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">Top Categories</h3>
                <div class="space-y-3">
                    @foreach($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}" 
                       class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 rounded-full" style="background-color: {{ $category->color ?? '#16A34A' }}"></div>
                            <span class="font-medium text-black dark:text-white">{{ $category->name }}</span>
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $category->articles_count }}</span>
                    </a>
                    @endforeach
                </div>
            </section>

            <!-- Newsletter Signup -->
            <section class="bg-gradient-to-r from-green-600 to-green-700 rounded-lg shadow-md p-6 text-white">
                <h3 class="text-xl font-bold mb-2">Stay Updated</h3>
                <p class="text-green-100 mb-4 text-sm">Get the latest Kenyan news delivered to your inbox daily.</p>
                <form id="newsletter-form" class="space-y-3">
                    @csrf
                    <input type="email" id="newsletter-email" name="email" required
                           placeholder="Enter your email"
                           class="w-full px-3 py-2 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-green-300">
                    <button type="submit" id="newsletter-btn"
                            class="w-full bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors font-medium">
                        Subscribe
                    </button>
                </form>
                <div id="newsletter-message" class="mt-3 text-sm hidden"></div>
                <p class="text-green-100 text-xs mt-3">No spam, unsubscribe anytime.</p>
            </section>

            <!-- Sidebar Ad -->
            <div class="bg-gray-100 dark:bg-gray-800 h-64 flex items-center justify-center text-gray-500 rounded-lg">
                <div class="text-center">
                    <p class="text-sm">Advertisement</p>
                    <p class="text-xs mt-1">Your ad could be here</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    
    // Article Preview on Hover
    function showPreview(element, title, excerpt, author, date) {
        const preview = document.createElement('div');
        preview.id = 'article-preview';
        preview.className = 'absolute z-50 bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-lg shadow-xl p-4 max-w-sm';
        preview.innerHTML = `
            <h4 class="font-semibold text-black dark:text-white mb-2 line-clamp-2">${title}</h4>
            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-3">${excerpt}</p>
            <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                <span>${author}</span>
                <span>${date}</span>
            </div>
        `;
        
        const rect = element.getBoundingClientRect();
        preview.style.top = (rect.bottom + window.scrollY + 10) + 'px';
        preview.style.left = Math.max(10, Math.min(window.innerWidth - 250, rect.left + window.scrollX - 100)) + 'px';
        
        document.body.appendChild(preview);
    }
    
    function hidePreview() {
        const preview = document.getElementById('article-preview');
        if (preview) {
            preview.remove();
        }
    }
    
    // Add hover events to article links
    document.addEventListener('DOMContentLoaded', function() {
        const previewLinks = document.querySelectorAll('[data-preview]');
        previewLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                const title = this.getAttribute('data-title');
                const excerpt = this.getAttribute('data-excerpt');
                const author = this.getAttribute('data-author');
                const date = this.getAttribute('data-date');
                showPreview(this, title, excerpt, author, date);
            });
            link.addEventListener('mouseleave', hidePreview);
        });
    });
    
    // Newsletter Signup
    document.getElementById('newsletter-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const email = document.getElementById('newsletter-email').value;
        const btn = document.getElementById('newsletter-btn');
        const message = document.getElementById('newsletter-message');
        
        // Show loading state
        btn.disabled = true;
        btn.textContent = 'Subscribing...';
        message.classList.add('hidden');
        
        // Send to backend API
        fetch('{{ route("newsletter.subscribe") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                message.textContent = data.message;
                message.className = 'mt-3 text-sm text-green-200';
                form.reset();
            } else {
                message.textContent = data.message;
                message.className = 'mt-3 text-sm text-yellow-200';
            }
            
            message.classList.remove('hidden');
            btn.disabled = false;
            btn.textContent = 'Subscribe';
            
            setTimeout(() => {
                message.classList.add('hidden');
            }, 5000);
        })
        .catch(error => {
            message.textContent = 'An error occurred. Please try again.';
            message.className = 'mt-3 text-sm text-red-200';
            message.classList.remove('hidden');
            btn.disabled = false;
            btn.textContent = 'Subscribe';
        });
    });
</script>
@endpush
@endsection