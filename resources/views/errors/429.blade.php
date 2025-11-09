@extends('layouts.app')

@section('title', '429 - Too Many Requests | News254')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-900 flex items-center justify-center px-4">
    <div class="max-w-lg mx-auto text-center">
        <!-- Error Illustration -->
        <div class="mb-8">
            <svg class="w-32 h-32 mx-auto text-red-300 dark:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
        </div>

        <!-- Error Code -->
        <div class="mb-6">
            <h1 class="text-6xl font-bold text-gray-900 dark:text-white mb-2">429</h1>
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Too Many Requests</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8">
                You've made too many requests in a short period. Please wait a moment before trying again.
            </p>
        </div>

        <!-- Rate Limit Info -->
        <div class="mb-8 p-6 bg-red-50 dark:bg-red-900/20 rounded-lg border border-red-200 dark:border-red-800">
            <h3 class="text-lg font-semibold text-red-800 dark:text-red-200 mb-2"><i class="fas fa-bolt mr-2"></i>Rate Limit Exceeded</h3>
            <p class="text-sm text-red-700 dark:text-red-300 mb-4">
                To ensure fair usage for all users, we limit the number of requests per minute. Please wait before making more requests.
            </p>
            <div class="text-xs text-red-600 dark:text-red-400">
                Try again in: <span id="countdown" class="font-mono font-bold">60</span> seconds
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex sm:justify-center">
            <button onclick="location.reload()" 
                    class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Try Again
            </button>
            <a href="{{ route('home') }}" 
               class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Go Home
            </a>
        </div>

        <!-- Tips -->
        <div class="mt-12">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Tips to avoid rate limits:</h3>
            <div class="text-left space-y-2 text-sm text-gray-600 dark:text-gray-400">
                <div class="flex items-start space-x-2">
                    <span class="text-green-600 font-bold">•</span>
                    <span>Wait a few seconds between requests</span>
                </div>
                <div class="flex items-start space-x-2">
                    <span class="text-green-600 font-bold">•</span>
                    <span>Avoid refreshing the page repeatedly</span>
                </div>
                <div class="flex items-start space-x-2">
                    <span class="text-green-600 font-bold">•</span>
                    <span>Use browser favorites for frequently visited pages</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let countdown = 60;
const countdownElement = document.getElementById('countdown');

const timer = setInterval(() => {
    countdown--;
    countdownElement.textContent = countdown;
    
    if (countdown <= 0) {
        clearInterval(timer);
        countdownElement.textContent = '0';
        // Enable try again button or auto-refresh
        const tryAgainBtn = document.querySelector('button[onclick="location.reload()"]');
        if (tryAgainBtn) {
            tryAgainBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            tryAgainBtn.disabled = false;
        }
    }
}, 1000);
</script>
@endsection