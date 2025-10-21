@extends('layouts.app')

@section('title', $article->title . ' - News254')
@section('description', $article->excerpt)
@section('og_type', 'article')
@section('og_title', $article->title)
@section('og_description', $article->excerpt)
@section('og_image', $article->featured_image)

@section('content')
<!-- Reading Progress Bar -->
<div id="reading-progress" class="fixed top-0 left-0 h-1 bg-green-600 z-50 transition-all duration-300" style="width: 0%;"></div>

<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm overflow-x-auto" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 whitespace-nowrap">
            <li class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li class="flex items-center">
                <svg class="w-5 h-5 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('category.show', $article->category->slug) }}" class="text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400">
                    {{ $article->category->name }}
                </a>
            </li>
            <li class="flex items-center">
                <svg class="w-5 h-5 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-gray-500 dark:text-gray-400">{{ Str::limit($article->title, 40) }}</span>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Article -->
        <div class="lg:col-span-2">
            <article class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <!-- Article Header -->
                <div class="relative image-container h-64 md:h-96">
                    <img src="{{ $article->featured_image }}" 
                         alt="{{ $article->title }}"
                         class="w-full h-full object-cover object-center">
                    <div class="absolute top-4 left-4">
                        <span class="text-white px-3 py-1 rounded-full text-sm font-medium" style="background-color: {{ $article->category->color ?? '#16A34A' }}">
                            {{ $article->category->name }}
                        </span>
                    </div>
                    @if($article->is_breaking)
                    <div class="absolute top-4 right-4">
                        <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold animate-pulse">
                            BREAKING
                        </span>
                    </div>
                    @endif
                </div>

                <div class="p-6 md:p-8">
                    <!-- Article Meta -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 text-sm text-gray-500 dark:text-gray-400 space-y-3 sm:space-y-0">
                        <div class="flex items-center space-x-4">
                            <img src="{{ $article->author->avatar }}" 
                                 alt="{{ $article->author->name }}"
                                 class="w-10 h-10 rounded-full">
                            <div>
                                <div class="font-medium text-black dark:text-white">{{ $article->author->name }}</div>
                                <div>{{ $article->published_at->format('M j, Y') }} • {{ $article->read_time ?? 5 }} min read</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span>{{ $article->views ?? 0 }} views</span>
                        </div>
                    </div>

                    <!-- Article Title -->
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                        {{ $article->title }}
                    </h1>

                    <!-- Article Excerpt -->
                    <div class="text-lg text-gray-600 dark:text-gray-300 mb-6 font-medium">
                        {{ $article->excerpt }}
                    </div>

                    <!-- Article Actions -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 pb-6 border-b dark:border-gray-700">
                        <div class="flex items-center flex-wrap gap-3">
                            <span class="text-gray-600 dark:text-gray-300 font-medium">Share:</span>
                            <div class="flex items-center gap-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                                   target="_blank" 
                                   class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition-colors" title="Share on Facebook">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}&via=News254kenya" 
                                   target="_blank"
                                   class="bg-blue-400 text-white p-3 rounded-full hover:bg-blue-500 transition-colors" title="Share on X">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current() . ' | Follow us: https://whatsapp.com/channel/0029VbAVMuk84Om39cyJIB1p') }}" 
                                   target="_blank"
                                   class="bg-green-500 text-white p-3 rounded-full hover:bg-green-600 transition-colors" title="Share on WhatsApp">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.085"/>
                                    </svg>
                                </a>
                                <button onclick="copyLink()" 
                                        class="bg-gray-600 text-white p-3 rounded-full hover:bg-gray-700 transition-colors" title="Copy Link">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Bookmark Button -->
                        <button onclick="toggleBookmark({{ $article->id }}, this)" 
                                class="bookmark-btn flex items-center space-x-2 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                                title="Bookmark this article">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                            <span class="text-sm text-gray-600 dark:text-gray-300">Save</span>
                        </button>
                    </div>

                    <!-- Article Content -->
                    <div class="prose prose-lg max-w-none text-black dark:text-white">
                        {!! $article->content !!}
                    </div>

                    <!-- Article Tags -->
                    @if($article->tags && count($article->tags) > 0)
                    <div class="mt-8 pt-6 border-t dark:border-gray-700">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="text-gray-600 dark:text-gray-300 font-medium">Tags:</span>
                            @foreach($article->tags as $tag)
                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full text-sm">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Author Bio -->
                    <div class="mt-8 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div class="flex items-start space-x-4">
                            <img src="{{ $article->author->avatar }}" 
                                 alt="{{ $article->author->name }}"
                                 class="w-16 h-16 rounded-full">
                            <div>
                                <h3 class="font-bold text-black dark:text-white mb-2">{{ $article->author->name }}</h3>
                                <p class="text-gray-600 dark:text-gray-300 mb-3">{{ $article->author->bio }}</p>
                                @if($article->author->social_links)
                                <div class="flex space-x-3">
                                    @if(isset($article->author->social_links['twitter']))
                                    <a href="{{ $article->author->social_links['twitter'] }}" 
                                       class="text-blue-400 hover:text-blue-500">Twitter</a>
                                    @endif
                                    @if(isset($article->author->social_links['email']))
                                    <a href="mailto:{{ $article->author->social_links['email'] }}" 
                                       class="text-gray-600 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200">Email</a>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Comments Section -->
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 md:p-8 mt-8">
                <h3 class="text-2xl font-bold text-black dark:text-white mb-6">Comments ({{ $article->comments->count() }})</h3>

                <!-- Success/Error Messages -->
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Comment Form -->
                <form id="comment-form" action="{{ route('article.comment', $article) }}" method="POST" class="mb-8">
                    <div id="form-messages"></div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="author_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                            <input type="text" id="author_name" name="author_name" required
                                   value="{{ old('author_name') }}"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white">
                            <div id="author_name_error" class="text-red-500 text-sm mt-1 hidden"></div>
                        </div>
                        <div>
                            <label for="author_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                            <input type="email" id="author_email" name="author_email" required
                                   value="{{ old('author_email') }}"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white">
                            <div id="author_email_error" class="text-red-500 text-sm mt-1 hidden"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Comment</label>
                        <textarea id="content" name="content" rows="4" required
                                  class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white"
                                  placeholder="Share your thoughts...">{{ old('content') }}</textarea>
                        <div id="content_error" class="text-red-500 text-sm mt-1 hidden"></div>
                    </div>
                    <button type="submit" id="submit-btn"
                            class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                        Post Comment
                    </button>
                </form>

                <!-- Comments List -->
                @if($article->comments->count() > 0)
                <div class="space-y-6">
                    @foreach($article->comments as $comment)
                    <div class="border-b border-gray-200 dark:border-gray-600 pb-6">
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">
                                {{ substr($comment->author_name, 0, 1) }}
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center space-x-2 mb-2">
                                    <h4 class="font-medium text-black dark:text-white">{{ $comment->author_name }}</h4>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-8">No comments yet. Be the first to comment!</p>
                @endif
            </section>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Related Articles -->
            @if($relatedArticles->count() > 0)
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold text-black dark:text-white mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">Related Articles</h3>
                <div class="space-y-4">
                    @foreach($relatedArticles as $relatedArticle)
                    <article class="flex space-x-3">
                        <div class="image-container w-20 h-16 flex-shrink-0 rounded">
                            <img src="{{ $relatedArticle->featured_image }}" 
                                 alt="{{ $relatedArticle->title }}"
                                 class="w-full h-full object-cover object-center">
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium text-black dark:text-white line-clamp-2 hover:text-green-600 dark:hover:text-green-400">
                                <a href="{{ route('article.show', $relatedArticle->slug) }}">
                                    {{ $relatedArticle->title }}
                                </a>
                            </h4>
                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                {{ $relatedArticle->published_at->diffForHumans() }}
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Sidebar Ad -->
            <div class="bg-gray-100 h-64 flex items-center justify-center text-gray-500 rounded-lg">
                <span>Advertisement</span>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Reading Progress Bar
function updateReadingProgress() {
    const article = document.querySelector('.prose');
    if (!article) return;
    
    const articleTop = article.offsetTop;
    const articleHeight = article.offsetHeight;
    const windowHeight = window.innerHeight;
    const scrollTop = window.pageYOffset;
    
    const progress = Math.min(100, Math.max(0, ((scrollTop - articleTop + windowHeight) / articleHeight) * 100));
    document.getElementById('reading-progress').style.width = progress + '%';
}

window.addEventListener('scroll', updateReadingProgress);
window.addEventListener('resize', updateReadingProgress);

function copyLink() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(function() {
        const button = event.target.closest('button');
        const originalTitle = button.title;
        button.title = 'Link Copied!';
        button.classList.add('bg-green-600');
        button.classList.remove('bg-gray-600');
        
        setTimeout(() => {
            button.title = originalTitle;
            button.classList.remove('bg-green-600');
            button.classList.add('bg-gray-600');
        }, 2000);
    }).catch(function(err) {
        console.error('Could not copy text: ', err);
        alert('Link copied to clipboard!');
    });
}

// AJAX Comment Form
document.getElementById('comment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const submitBtn = document.getElementById('submit-btn');
    const messagesDiv = document.getElementById('form-messages');
    
    // Clear previous errors
    document.querySelectorAll('[id$="_error"]').forEach(el => {
        el.classList.add('hidden');
        el.textContent = '';
    });
    messagesDiv.innerHTML = '';
    
    // Show loading state
    submitBtn.disabled = true;
    submitBtn.textContent = 'Posting...';
    
    const formData = new FormData(form);
    
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            messagesDiv.innerHTML = '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">' + data.message + '</div>';
            
            const commentsList = document.querySelector('.space-y-6');
            const noCommentsMsg = document.querySelector('.text-center.py-8');
            
            if (noCommentsMsg) {
                noCommentsMsg.remove();
            }
            
            if (!commentsList) {
                const commentsSection = document.querySelector('h3').parentNode;
                const newCommentsList = document.createElement('div');
                newCommentsList.className = 'space-y-6';
                commentsSection.appendChild(newCommentsList);
            }
            
            const newComment = document.createElement('div');
            newComment.className = 'border-b border-gray-200 dark:border-gray-600 pb-6 opacity-0 transform translate-y-4';
            newComment.innerHTML = `
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">
                        ${data.comment.author_name.charAt(0).toUpperCase()}
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center space-x-2 mb-2">
                            <h4 class="font-medium text-black dark:text-white">${data.comment.author_name}</h4>
                            <span class="text-sm text-gray-500 dark:text-gray-400">just now</span>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300">${data.comment.content}</p>
                    </div>
                </div>
            `;
            
            const existingCommentsList = document.querySelector('.space-y-6');
            if (existingCommentsList) {
                existingCommentsList.insertBefore(newComment, existingCommentsList.firstChild);
            }
            
            // Animate in
            setTimeout(() => {
                newComment.classList.remove('opacity-0', 'transform', 'translate-y-4');
                newComment.classList.add('transition-all', 'duration-300');
            }, 10);
            
            const commentCountEl = document.querySelector('h3');
            if (commentCountEl) {
                const currentCount = parseInt(commentCountEl.textContent.match(/\d+/)[0]) || 0;
                commentCountEl.textContent = `Comments (${currentCount + 1})`;
            }
            
            form.reset();
            
            // Hide success message after 3 seconds
            setTimeout(() => {
                messagesDiv.innerHTML = '';
            }, 3000);
        } else if (data.errors) {
            Object.keys(data.errors).forEach(field => {
                const errorDiv = document.getElementById(field + '_error');
                if (errorDiv) {
                    errorDiv.textContent = data.errors[field][0];
                    errorDiv.classList.remove('hidden');
                }
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        messagesDiv.innerHTML = '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">An error occurred. Please try again.</div>';
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Post Comment';
    });
});

// Bookmark functionality
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
            const svg = button.querySelector('svg');
            const text = button.querySelector('span');
            
            if (data.bookmarked) {
                svg.setAttribute('fill', 'currentColor');
                svg.classList.add('text-red-500');
                text.textContent = 'Saved';
                button.title = 'Remove from bookmarks';
                button.classList.add('bookmarked');
            } else {
                svg.setAttribute('fill', 'none');
                svg.classList.remove('text-red-500');
                text.textContent = 'Save';
                button.title = 'Bookmark this article';
                button.classList.remove('bookmarked');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Check if article is bookmarked on page load
document.addEventListener('DOMContentLoaded', function() {
    const bookmarkBtn = document.querySelector('.bookmark-btn');
    if (bookmarkBtn) {
        const articleId = {{ $article->id }};
        
        const bookmarks = JSON.parse(localStorage.getItem('bookmarks') || '[]');
        if (bookmarks.includes(articleId.toString())) {
            const svg = bookmarkBtn.querySelector('svg');
            const text = bookmarkBtn.querySelector('span');
            
            svg.setAttribute('fill', 'currentColor');
            svg.classList.add('text-red-500');
            text.textContent = 'Saved';
            bookmarkBtn.title = 'Remove from bookmarks';
            bookmarkBtn.classList.add('bookmarked');
        }
    }
});
</script>
@endpush