@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Category</h1>
</div>

<div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
    <form action="{{ route('admin.categories.update', ['taxonomy' => $category]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required
                       class="w-full px-3 py-2 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-black text-white">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required
                       class="w-full px-3 py-2 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-black text-white">
                @error('slug')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Color</label>
                <input type="color" id="color" name="color" value="{{ old('color', $category->color) }}" required
                       class="w-full h-10 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-black">
                @error('color')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
            <textarea id="description" name="description" rows="3"
                      class="w-full px-3 py-2 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-black text-white">{{ old('description', $category->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4 mt-6">
            <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                Cancel
            </a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                Update Category
            </button>
        </div>
    </form>
</div>
@endsection