@extends('layouts.admin')

@section('title', 'Authors')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Authors</h1>
    <a href="{{ route('admin.authors.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
        Create New Author
    </a>
</div>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
    {{ session('error') }}
</div>
@endif

<div class="bg-black rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-600">
        <thead class="bg-black">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Author</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Articles</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-black divide-y divide-gray-600">
            @foreach($authors as $author)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <img src="{{ $author->avatar }}" alt="{{ $author->name }}" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <div class="text-sm font-medium text-white">{{ $author->name }}</div>
                            <div class="text-sm text-white">{{ Str::limit($author->bio, 50) }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $author->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $author->articles_count }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                    <a href="{{ route('admin.authors.edit', $author) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
                    <form action="{{ route('admin.authors.destroy', $author) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
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
@endsection