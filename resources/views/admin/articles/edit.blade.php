@extends('layouts.admin')

@section('title', 'Edit Article - News254 Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Edit Article</h1>
        <p class="text-gray-600">Update article information</p>
    </div>

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title -->
                <div class="bg-white rounded-lg shadow p-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" id="title" name="title" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                           value="{{ old('title', $article->title) }}"
                           placeholder="Enter article title...">
                    @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div class="bg-white rounded-lg shadow p-6">
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="3" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                              placeholder="Brief summary of the article...">{{ old('excerpt', $article->excerpt) }}</textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div class="bg-white rounded-lg shadow p-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}">
                    <trix-editor input="content" class="trix-content" placeholder="Write your article content here..."></trix-editor>
                    @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Publish Options -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Publish Options</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox" id="is_draft" name="is_draft" value="1" 
                                   class="rounded border-gray-300 text-green-600 focus:ring-green-500"
                                   {{ old('is_draft', $article->is_draft) ? 'checked' : '' }}>
                            <label for="is_draft" class="ml-2 text-sm text-gray-700">Save as Draft</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" id="is_featured" name="is_featured" value="1"
                                   class="rounded border-gray-300 text-green-600 focus:ring-green-500"
                                   {{ old('is_featured', $article->is_featured) ? 'checked' : '' }}>
                            <label for="is_featured" class="ml-2 text-sm text-gray-700">Featured Article</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" id="is_breaking" name="is_breaking" value="1"
                                   class="rounded border-gray-300 text-green-600 focus:ring-green-500"
                                   {{ old('is_breaking', $article->is_breaking) ? 'checked' : '' }}>
                            <label for="is_breaking" class="ml-2 text-sm text-gray-700">Breaking News</label>
                        </div>
                    </div>
                </div>

                <!-- Article Details -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Article Details</h3>
                    
                    <div class="space-y-4">
                        <!-- Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <select id="category_id" name="category_id" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Author -->
                        <div>
                            <label for="author_id" class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                            <select id="author_id" name="author_id" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Select Author</option>
                                @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ old('author_id', $article->author_id) == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('author_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Featured Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                            <div class="space-y-3">
                                <div>
                                    <label for="image_upload" class="block text-xs text-gray-500 mb-1">Upload Image</label>
                                    <input type="file" id="image_upload" accept="image/*" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                    <div id="upload_progress" class="hidden mt-2">
                                        <div class="bg-gray-200 rounded-full h-2">
                                            <div id="progress_bar" class="bg-green-600 h-2 rounded-full" style="width: 0%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center text-gray-500 text-sm">OR</div>
                                <div>
                                    <label for="featured_image" class="block text-xs text-gray-500 mb-1">Image URL</label>
                                    <input type="url" id="featured_image" name="featured_image" required
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                                           value="{{ old('featured_image', $article->featured_image) }}"
                                           placeholder="https://example.com/image.jpg">
                                </div>
                                <div id="image_preview" class="{{ $article->featured_image ? '' : 'hidden' }}">
                                    <img id="preview_img" src="{{ $article->featured_image }}" alt="Preview" class="w-full h-32 object-cover rounded-lg">
                                </div>
                            </div>
                            @error('featured_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tags -->
                        <div>
                            <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                            <input type="text" id="tags" name="tags"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                                   value="{{ old('tags', is_array($article->tags) ? implode(', ', $article->tags) : '') }}"
                                   placeholder="tag1, tag2, tag3">
                            <p class="text-xs text-gray-500 mt-1">Separate tags with commas</p>
                            @error('tags')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex flex-col space-y-3">
                        <button type="submit" 
                                class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                            Update Article
                        </button>
                        <a href="{{ route('admin.articles.index') }}" 
                           class="w-full bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors text-center">
                            Cancel
                        </a>
                        <a href="{{ route('article.show', $article->slug) }}" target="_blank"
                           class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-center">
                            Preview Article
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('image_upload').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    
    const formData = new FormData();
    formData.append('image', file);
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
    
    const progressDiv = document.getElementById('upload_progress');
    const progressBar = document.getElementById('progress_bar');
    const preview = document.getElementById('image_preview');
    const previewImg = document.getElementById('preview_img');
    const urlInput = document.getElementById('featured_image');
    
    progressDiv.classList.remove('hidden');
    
    fetch('{{ route("admin.upload.image") }}', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            urlInput.value = window.location.origin + data.url;
            previewImg.src = window.location.origin + data.url;
            preview.classList.remove('hidden');
            progressBar.style.width = '100%';
            setTimeout(() => progressDiv.classList.add('hidden'), 1000);
        } else {
            alert('Upload failed');
            progressDiv.classList.add('hidden');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Upload failed');
        progressDiv.classList.add('hidden');
    });
});

document.getElementById('featured_image').addEventListener('input', function(e) {
    const url = e.target.value;
    const preview = document.getElementById('image_preview');
    const previewImg = document.getElementById('preview_img');
    
    if (url) {
        previewImg.src = url;
        preview.classList.remove('hidden');
    } else {
        preview.classList.add('hidden');
    }
});
</script>
@endpush