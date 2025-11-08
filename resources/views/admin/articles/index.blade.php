@extends('layouts.admin')

@section('title', 'Manage Articles - News254 Admin')

@section('content')
<div class="container mx-auto px-2 sm:px-4 lg:px-4 py-4 lg:py-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 sm:mb-6 lg:mb-8 gap-3 sm:gap-4">
        <div>
            <h1 class="responsive-text-2xl lg:text-3xl font-bold text-white">Articles</h1>
            <p class="text-gray-400 responsive-text-sm lg:text-base">Manage your news articles</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" 
           class="bg-green-600 text-white px-3 sm:px-4 py-2 sm:py-2.5 rounded-lg hover:bg-green-700 transition-colors responsive-text-sm lg:text-base w-full sm:w-auto text-center font-medium">
            <span class="sm:hidden">+ New</span>
            <span class="hidden sm:inline">Create New Article</span>
        </a>
    </div>

    <!-- Mobile Card View -->
    <div class="lg:hidden space-y-3 sm:space-y-4">
        @foreach($articles as $article)
        <div class="mobile-card">
            <div class="flex items-start space-x-3">
                <img src="{{ $article->featured_image }}" 
                     alt="{{ $article->title }}"
                     class="w-12 h-9 sm:w-16 sm:h-12 object-cover rounded flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <h3 class="mobile-card-header responsive-text-sm mb-2 leading-tight">
                        {{ Str::limit($article->title, 60) }}
                    </h3>
                    <div class="flex flex-wrap items-center gap-1 sm:gap-2 mb-2 sm:mb-3">
                        <span class="bg-green-600 text-white px-1.5 sm:px-2 py-0.5 sm:py-1 rounded responsive-text-xs">
                            {{ $article->category->name }}
                        </span>
                        @if($article->is_draft)
                        <span class="bg-yellow-600 text-white px-1.5 sm:px-2 py-0.5 sm:py-1 rounded responsive-text-xs">
                            Draft
                        </span>
                        @else
                        <span class="bg-green-600 text-white px-1.5 sm:px-2 py-0.5 sm:py-1 rounded responsive-text-xs">
                            Published
                        </span>
                        @endif
                        @if($article->is_breaking)
                        <span class="bg-red-600 text-white px-1.5 sm:px-2 py-0.5 sm:py-1 rounded responsive-text-xs">
                            Breaking
                        </span>
                        @endif
                        @if($article->is_featured)
                        <span class="bg-blue-600 text-white px-1.5 sm:px-2 py-0.5 sm:py-1 rounded responsive-text-xs">
                            Featured
                        </span>
                        @endif
                    </div>
                    <div class="grid grid-cols-2 gap-2 responsive-text-xs text-gray-400 mb-2">
                        <span>{{ $article->author->name }}</span>
                        <span class="text-right">{{ number_format($article->views) }} views</span>
                        <span class="col-span-2">{{ $article->created_at->format('M j, Y') }}</span>
                    </div>
                    <div class="mobile-card-actions">
                        <a href="{{ route('admin.articles.show', $article) }}" 
                           class="bg-blue-600 text-white px-2 sm:px-3 py-1 sm:py-1.5 rounded responsive-text-xs hover:bg-blue-700 transition-colors">
                            View
                        </a>
                        <a href="{{ route('admin.articles.edit', $article) }}" 
                           class="bg-green-600 text-white px-2 sm:px-3 py-1 sm:py-1.5 rounded responsive-text-xs hover:bg-green-700 transition-colors">
                            Edit
                        </a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" 
                              method="POST" class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this article?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-2 sm:px-3 py-1 sm:py-1.5 rounded responsive-text-xs hover:bg-red-700 transition-colors">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Desktop Table View -->
    <div class="hidden lg:block bg-black rounded-lg border border-gray-600 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-600">
                <thead class="bg-black">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Article
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Category
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Author
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Views
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-black divide-y divide-gray-600">
                    @foreach($articles as $article)
                    <tr class="hover:bg-gray-800">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="{{ $article->featured_image }}" 
                                     alt="{{ $article->title }}"
                                     class="w-16 h-12 object-cover rounded mr-4">
                                <div>
                                    <div class="text-sm font-medium text-white line-clamp-2">
                                        {{ $article->title }}
                                    </div>
                                    <div class="flex items-center space-x-2 mt-1">
                                        @if($article->is_breaking)
                                        <span class="bg-red-600 text-white px-2 py-1 rounded-full text-xs font-medium">
                                            Breaking
                                        </span>
                                        @endif
                                        @if($article->is_featured)
                                        <span class="bg-blue-600 text-white px-2 py-1 rounded-full text-xs font-medium">
                                            Featured
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-green-600 text-white px-2 py-1 rounded-full text-xs font-medium">
                                {{ $article->category->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                            {{ $article->author->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($article->is_draft)
                            <span class="bg-yellow-600 text-white px-2 py-1 rounded-full text-xs font-medium">
                                Draft
                            </span>
                            @else
                            <span class="bg-green-600 text-white px-2 py-1 rounded-full text-xs font-medium">
                                Published
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                            {{ number_format($article->views) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                            {{ $article->created_at->format('M j, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.articles.show', $article) }}" 
                                   class="text-blue-400 hover:text-blue-300">View</a>
                                <a href="{{ route('admin.articles.edit', $article) }}" 
                                   class="text-green-400 hover:text-green-300">Edit</a>
                                <form action="{{ route('admin.articles.destroy', $article) }}" 
                                      method="POST" class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this article?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 sm:mt-6">
        <div class="responsive-text-sm">
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection