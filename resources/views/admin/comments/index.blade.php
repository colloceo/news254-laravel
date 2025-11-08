@extends('layouts.admin')

@section('title', 'Comments')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Comments</h1>
</div>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<div class="bg-black rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-600">
        <thead class="bg-black">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Author</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Comment</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Article</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-black divide-y divide-gray-600">
            @foreach($comments as $comment)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div>
                        <div class="text-sm font-medium text-white">{{ $comment->author_name }}</div>
                        <div class="text-sm text-white">{{ $comment->author_email }}</div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm text-white max-w-xs truncate">{{ $comment->content }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('article.show', $comment->article->slug) }}" class="text-blue-400 hover:text-blue-300 text-sm">
                        {{ Str::limit($comment->article->title, 30) }}
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($comment->is_approved)
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                    @else
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                    {{ $comment->created_at->format('M j, Y') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                    @if(!$comment->is_approved)
                    <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-green-400 hover:text-green-300">Approve</button>
                    </form>
                    @else
                    <form action="{{ route('admin.comments.reject', $comment) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-yellow-400 hover:text-yellow-300">Reject</button>
                    </form>
                    @endif
                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $comments->links() }}
</div>
@endsection