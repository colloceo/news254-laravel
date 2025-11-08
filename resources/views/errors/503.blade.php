@extends('layouts.app')

@section('title', '503 - Service Unavailable | News254')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-900 flex items-center justify-center px-4">
    <div class="max-w-lg mx-auto text-center">
        <!-- Error Illustration -->
        <div class="mb-8">
            <svg class="w-32 h-32 mx-auto text-blue-300 dark:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
        </div>

        <!-- Error Code -->
        <div class="mb-6">
            <h1 class="text-6xl font-bold text-gray-900 dark:text-white mb-2">503</h1>
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Service Unavailable</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8">
                News254 is temporarily unavailable due to maintenance. We'll be back online shortly!
            </p>
        </div>

        <!-- Maintenance Info -->
        <div class="mb-8 p-6 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
            <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-200 mb-2"><i class="fas fa-wrench mr-2"></i>Scheduled Maintenance</h3>
            <p class="text-sm text-blue-700 dark:text-blue-300 mb-4">
                We're performing routine maintenance to improve your experience. This should only take a few minutes.
            </p>
            <div class="text-xs text-blue-600 dark:text-blue-400">
                Started: {{ now()->format('M d, Y H:i') }} EAT
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
            <a href="https://twitter.com/news254ke" target="_blank"
               class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
                Updates
            </a>
        </div>

        <!-- Social Links -->
        <div class="mt-12">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Stay Connected</h3>
            <div class="flex justify-center space-x-4">
                <a href="https://www.facebook.com/profile.php?id=61577716408403" target="_blank" 
                   class="p-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
                <a href="https://twitter.com/news254ke" target="_blank" 
                   class="p-3 bg-blue-400 hover:bg-blue-500 text-white rounded-full transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>
                </a>
                <a href="https://whatsapp.com/channel/0029VbAVMuk84Om39cyJIB1p" target="_blank" 
                   class="p-3 bg-green-600 hover:bg-green-700 text-white rounded-full transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.386"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Auto Refresh -->
        <div class="mt-8 text-xs text-gray-500 dark:text-gray-400">
            <p>This page will automatically refresh in <span id="countdown">60</span> seconds</p>
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
        location.reload();
    }
}, 1000);
</script>
@endsection