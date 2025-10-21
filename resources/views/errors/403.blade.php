@extends('layouts.app')

@section('title', '403 - Access Forbidden | News254')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-900 flex items-center justify-center px-4">
    <div class="max-w-lg mx-auto text-center">
        <!-- Error Illustration -->
        <div class="mb-8">
            <svg class="w-32 h-32 mx-auto text-yellow-300 dark:text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
        </div>

        <!-- Error Code -->
        <div class="mb-6">
            <h1 class="text-6xl font-bold text-gray-900 dark:text-white mb-2">403</h1>
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Access Forbidden</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8">
                You don't have permission to access this resource. This area may be restricted to authorized users only.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex sm:justify-center">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Go Home
            </a>
            @guest
            <a href="{{ route('login') }}" 
               class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Login
            </a>
            @endguest
        </div>

        <!-- Information Box -->
        <div class="mt-12 p-6 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg border border-yellow-200 dark:border-yellow-800">
            <h3 class="text-lg font-semibold text-yellow-800 dark:text-yellow-200 mb-2">Restricted Access</h3>
            <p class="text-sm text-yellow-700 dark:text-yellow-300">
                This content or feature is only available to authorized users. If you believe you should have access, please contact our support team.
            </p>
        </div>

        <!-- Contact Information -->
        <div class="mt-8">
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Need access? Contact us:</p>
            <div class="space-y-2 text-sm">
                <div class="flex items-center justify-center space-x-2">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                    </svg>
                    <span class="text-gray-700 dark:text-gray-300">justintech81@gmail.com</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection