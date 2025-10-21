@extends('layouts.admin')

@section('title', 'System Information - News254 Admin')

@section('content')
<div class="container mx-auto px-0 lg:px-4 py-4 lg:py-8">
    <div class="mb-6 lg:mb-8">
        <h1 class="text-2xl lg:text-3xl font-bold text-white">System Information</h1>
        <p class="text-gray-400 text-sm lg:text-base">Server and application details</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
        <!-- Server Information -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
            <h2 class="text-lg font-semibold text-white mb-4">Server Information</h2>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-400">PHP Version</span>
                    <span class="text-white">{{ $info['php_version'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400">Laravel Version</span>
                    <span class="text-white">{{ $info['laravel_version'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400">Server Software</span>
                    <span class="text-white text-sm">{{ $info['server_software'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400">Memory Limit</span>
                    <span class="text-white">{{ $info['memory_limit'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400">Max Execution Time</span>
                    <span class="text-white">{{ $info['max_execution_time'] }}s</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400">Upload Max Filesize</span>
                    <span class="text-white">{{ $info['upload_max_filesize'] }}</span>
                </div>
            </div>
        </div>

        <!-- Storage Information -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
            <h2 class="text-lg font-semibold text-white mb-4">Storage Information</h2>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-400">Free Space</span>
                    <span class="text-white">{{ $info['disk_free_space'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400">Total Space</span>
                    <span class="text-white">{{ $info['disk_total_space'] }}</span>
                </div>
                <div class="mt-4">
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Disk Usage</span>
                        <span class="text-white">75%</span>
                    </div>
                    <div class="w-full bg-gray-600 rounded-full h-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-6 lg:mt-8">
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
            <h2 class="text-lg font-semibold text-white mb-4">System Actions</h2>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('admin.config.clear-cache') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-center"
                   onclick="return confirm('Clear all cache?')">
                    Clear Cache
                </a>
                <a href="{{ route('admin.site.backup') }}" 
                   class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-center">
                    Download Backup
                </a>
                <button onclick="window.location.reload()" 
                        class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                    Refresh Info
                </button>
            </div>
        </div>
    </div>
</div>
@endsection