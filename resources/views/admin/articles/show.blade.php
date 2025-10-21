@extends('layouts.admin')

@section('title', 'Article Details - News254 Admin')

@section('content')
<div class="container mx-auto px-0 lg:px-4 py-4 lg:py-8">
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6 lg:mb-8 gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-white">Article Details</h1>
            <p class="text-gray-400 text-sm lg:text-base">View and manage article information</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-2 lg:gap-4 w-full sm:w-auto">
            <a href="{{ route('admin.articles.edit', $article) }}" 
               class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-center">
                Edit Article
            </a>
            <a href="{{ route('article.show', $article->slug) }}" target="_blank"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-center">
                View Live
            </a>
            <a href="{{ route('admin.articles.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors text-center">
                Back to List
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Article Content -->
            <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-white">{{ $article->title }}</h2>
                    <div class="flex items-center space-x-2">
                        @if($article->is_featured)
                        <span class="bg-blue-600 text-white px-2 py-1 rounded text-xs">Featured</span>
                        @endif
                        @if($article->is_breaking)
                        <span class="bg-red-600 text-white px-2 py-1 rounded text-xs">Breaking</span>
                        @endif
                        <span class="px-2 py-1 rounded text-xs {{ $article->is_draft ? 'bg-yellow-600 text-white' : 'bg-green-600 text-white' }}">
                            {{ $article->is_draft ? 'Draft' : 'Published' }}
                        </span>
                    </div>
                </div>
                
                @if($article->featured_image)
                <div class="mb-4">
                    <img src="{{ $article->featured_image }}" alt="{{ $article->title }}" 
                         class="w-full h-64 object-cover rounded-lg">
                </div>
                @endif
                
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-white mb-2">Excerpt</h3>
                    <p class="text-gray-300">{{ $article->excerpt }}</p>
                </div>
                
                <div class="prose prose-invert max-w-none">
                    <h3 class="text-lg font-medium text-white mb-2">Content</h3>
                    <div class="text-gray-300 leading-relaxed">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-white">Comments ({{ $article->comments->count() }})</h2>
                    <button onclick="toggleCommentModeration()" 
                            class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700 transition-colors">
                        Moderate All
                    </button>
                </div>
                
                @if($article->comments->count() > 0)
                <div class="space-y-4" id="comments-list">
                    @foreach($article->comments as $comment)
                    <div class="bg-gray-700 rounded-lg p-4 comment-item" data-comment-id="{{ $comment->id }}">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-medium text-white">{{ $comment->author_name }}</h4>
                                <p class="text-gray-400 text-sm">{{ $comment->author_email }}</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-400 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
                                @if(!$comment->is_approved)
                                <span class="bg-yellow-600 text-white px-2 py-1 rounded text-xs">Pending</span>
                                @endif
                            </div>
                        </div>
                        <p class="text-gray-300 mb-3">{{ $comment->content }}</p>
                        <div class="flex space-x-2">
                            @if(!$comment->is_approved)
                            <button onclick="approveComment({{ $comment->id }})" 
                                    class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700 transition-colors">
                                Approve
                            </button>
                            @endif
                            <button onclick="deleteComment({{ $comment->id }})" 
                                    class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700 transition-colors">
                                Delete
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-400 text-center py-8">No comments yet</p>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Article Stats -->
            <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Article Statistics</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Views</span>
                        <span class="text-white font-semibold">{{ number_format($article->views) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Comments</span>
                        <span class="text-white font-semibold">{{ $article->comments->count() }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Reading Time</span>
                        <span class="text-white font-semibold">{{ ceil(str_word_count(strip_tags($article->content)) / 200) }} min</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Word Count</span>
                        <span class="text-white font-semibold">{{ number_format(str_word_count(strip_tags($article->content))) }}</span>
                    </div>
                </div>
            </div>

            <!-- Article Meta -->
            <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Article Information</h3>
                <div class="space-y-3">
                    <div>
                        <span class="text-gray-400 text-sm">Category</span>
                        <p class="text-white">{{ $article->category->name }}</p>
                    </div>
                    <div>
                        <span class="text-gray-400 text-sm">Author</span>
                        <p class="text-white">{{ $article->author->name }}</p>
                    </div>
                    <div>
                        <span class="text-gray-400 text-sm">Created</span>
                        <p class="text-white">{{ $article->created_at->format('M j, Y g:i A') }}</p>
                    </div>
                    @if($article->published_at)
                    <div>
                        <span class="text-gray-400 text-sm">Published</span>
                        <p class="text-white">{{ $article->published_at->format('M j, Y g:i A') }}</p>
                    </div>
                    @endif
                    <div>
                        <span class="text-gray-400 text-sm">Last Updated</span>
                        <p class="text-white">{{ $article->updated_at->format('M j, Y g:i A') }}</p>
                    </div>
                    @if($article->tags)
                    <div>
                        <span class="text-gray-400 text-sm">Tags</span>
                        <div class="flex flex-wrap gap-1 mt-1">
                            @foreach(explode(',', $article->tags) as $tag)
                            <span class="bg-gray-700 text-gray-300 px-2 py-1 rounded text-xs">{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Quick Actions</h3>
                <div class="space-y-2">
                    <button onclick="toggleFeature()" 
                            class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                        {{ $article->is_featured ? 'Remove from Featured' : 'Mark as Featured' }}
                    </button>
                    <button onclick="toggleBreaking()" 
                            class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors text-sm">
                        {{ $article->is_breaking ? 'Remove Breaking' : 'Mark as Breaking' }}
                    </button>
                    <button onclick="toggleStatus()" 
                            class="w-full bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition-colors text-sm">
                        {{ $article->is_draft ? 'Publish Article' : 'Move to Draft' }}
                    </button>
                    <button onclick="duplicateArticle()" 
                            class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm">
                        Duplicate Article
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleFeature() {
    updateArticle('toggle_featured');
}

function toggleBreaking() {
    updateArticle('toggle_breaking');
}

function toggleStatus() {
    updateArticle('toggle_status');
}

function updateArticle(action) {
    fetch(`/admin/articles/{{ $article->id }}/quick-update`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ action: action })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}

function approveComment(commentId) {
    fetch(`/admin/comments/${commentId}/approve`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}

function deleteComment(commentId) {
    if (confirm('Are you sure you want to delete this comment?')) {
        fetch(`/admin/comments/${commentId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector(`[data-comment-id="${commentId}"]`).remove();
            }
        });
    }
}
</script>
@endsection