@extends('layouts.app')

@section('title', '419 - Session Expired | News254')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-900 flex items-center justify-center px-4">
    <div class="max-w-lg mx-auto text-center">
        <!-- Error Illustration -->
        <div class="mb-8">
            <svg class="w-32 h-32 mx-auto text-orange-300 dark:text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>

        <!-- Error Code -->
        <div class="mb-6">
            <h1 class="text-6xl font-bold text-gray-900 dark:text-white mb-2">419</h1>
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Session Expired</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8">
                Your session has expired for security reasons. Please refresh the page and try again.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex sm:justify-center">
            <button onclick="location.reload()" 
                    class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Refresh Page
            </button>
            <a href="{{ route('home') }}" 
               class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Go Home
            </a>
        </div>

        <!-- Information Box -->
        <div class="mt-12 p-6 bg-orange-50 dark:bg-orange-900/20 rounded-lg border border-orange-200 dark:border-orange-800">
            <h3 class="text-lg font-semibold text-orange-800 dark:text-orange-200 mb-2">Security Notice</h3>
            <p class="text-sm text-orange-700 dark:text-orange-300">
                For your security, sessions expire after a period of inactivity. This helps protect your account from unauthorized access.
            </p>
        </div>

        <!-- Tips -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">What you can do:</h3>
            <div class="text-left space-y-2 text-sm text-gray-600 dark:text-gray-400">
                <div class="flex items-start space-x-2">
                    <span class="text-green-600 font-bold">•</span>
                    <span>Refresh the page to start a new session</span>
                </div>
                <div class="flex items-start space-x-2">
                    <span class="text-green-600 font-bold">•</span>
                    <span>Clear your browser cache and cookies</span>
                </div>
                <div class="flex items-start space-x-2">
                    <span class="text-green-600 font-bold">•</span>
                    <span>Try logging in again if you were signed in</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection