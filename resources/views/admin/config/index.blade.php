@extends('layouts.admin')

@section('title', 'Site Configuration - News254 Admin')

@section('content')
<div class="container mx-auto px-2 sm:px-4 lg:px-4 py-3 sm:py-4 lg:py-8">
    <div class="mb-4 sm:mb-6 lg:mb-8">
        <h1 class="responsive-text-xl sm:text-2xl lg:text-3xl font-bold text-white">Site Configuration</h1>
        <p class="text-gray-400 responsive-text-sm lg:text-base">Manage site settings and configurations</p>
    </div>

    <form action="{{ route('admin.config.update') }}" method="POST" class="space-y-4 sm:space-y-6 lg:space-y-8">
        @csrf
        @method('PUT')

        <!-- General Settings -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-3 sm:p-4 lg:p-6">
            <h2 class="responsive-text-base sm:text-lg lg:text-xl font-semibold text-white mb-3 sm:mb-4 lg:mb-6">General Settings</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 sm:gap-4 lg:gap-6">
                <div>
                    <label class="block responsive-text-sm font-medium text-gray-300 mb-2">Site Name</label>
                    <input type="text" name="site_name" value="{{ $configs['site_name'] }}" 
                           class="form-input w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                
                <div>
                    <label class="block responsive-text-sm font-medium text-gray-300 mb-2">Articles Per Page</label>
                    <input type="number" name="articles_per_page" value="{{ $configs['articles_per_page'] }}" min="1" max="50"
                           class="form-input w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                
                <div class="lg:col-span-2">
                    <label class="block responsive-text-sm font-medium text-gray-300 mb-2">Site Description</label>
                    <textarea name="site_description" rows="3" 
                              class="form-input w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ $configs['site_description'] }}</textarea>
                </div>
                
                <div class="lg:col-span-2">
                    <label class="block responsive-text-sm font-medium text-gray-300 mb-2">SEO Keywords</label>
                    <input type="text" name="site_keywords" value="{{ $configs['site_keywords'] }}" 
                           class="form-input w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <p class="responsive-text-xs text-gray-400 mt-1">Separate keywords with commas</p>
                </div>
            </div>
        </div>

        <!-- Content Settings -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
            <h2 class="text-lg lg:text-xl font-semibold text-white mb-4 lg:mb-6">Content Settings</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Featured Articles Count</label>
                    <input type="number" name="featured_articles_count" value="{{ $configs['featured_articles_count'] }}" min="1" max="20"
                           class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Related Articles Count</label>
                    <input type="number" name="related_articles_count" value="{{ $configs['related_articles_count'] }}" min="1" max="10"
                           class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Cache Duration (seconds)</label>
                    <input type="number" name="cache_duration" value="{{ $configs['cache_duration'] }}" min="300" max="86400"
                           class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
            </div>
        </div>

        <!-- Feature Toggles -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-3 sm:p-4 lg:p-6">
            <h2 class="responsive-text-base sm:text-lg lg:text-xl font-semibold text-white mb-3 sm:mb-4 lg:mb-6">Feature Settings</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6">
                <div class="flex items-center justify-between p-2 sm:p-3 bg-gray-700 rounded-lg">
                    <span class="text-white responsive-text-sm">Comments Enabled</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="comments_enabled" value="1" {{ $configs['comments_enabled'] ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                    <span class="text-white text-sm">Auto Approve Comments</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="auto_approve_comments" value="1" {{ $configs['auto_approve_comments'] ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                    <span class="text-white text-sm">Breaking News</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="breaking_news_enabled" value="1" {{ $configs['breaking_news_enabled'] ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                    <span class="text-white text-sm">Analytics</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="analytics_enabled" value="1" {{ $configs['analytics_enabled'] ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                    <span class="text-white text-sm">Social Sharing</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="social_sharing_enabled" value="1" {{ $configs['social_sharing_enabled'] ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                    <span class="text-white text-sm">Advertisements</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="ads_enabled" value="1" {{ $configs['ads_enabled'] ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
            </div>
        </div>

        <!-- System Settings -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-3 sm:p-4 lg:p-6">
            <h2 class="responsive-text-base sm:text-lg lg:text-xl font-semibold text-white mb-3 sm:mb-4 lg:mb-6">System Settings</h2>
            
            <div class="flex items-center justify-between p-3 sm:p-4 bg-red-900/20 border border-red-700 rounded-lg">
                <div>
                    <span class="text-white font-medium responsive-text-sm sm:text-base">Maintenance Mode</span>
                    <p class="text-gray-400 responsive-text-xs sm:text-sm">Enable to put site in maintenance mode</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="maintenance_mode" value="1" {{ $configs['maintenance_mode'] ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                </label>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 lg:gap-6">
            <button type="submit" class="btn bg-green-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-green-700 transition-colors font-medium responsive-text-sm">
                Save Configuration
            </button>
            
            <a href="{{ route('admin.config.clear-cache') }}" 
               class="btn bg-blue-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-blue-700 transition-colors font-medium text-center responsive-text-sm"
               onclick="return confirm('Are you sure you want to clear all cache?')">
                Clear Cache
            </a>
            
            <a href="{{ route('admin.dashboard') }}" 
               class="btn bg-gray-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-gray-700 transition-colors font-medium text-center responsive-text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection