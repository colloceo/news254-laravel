<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Admin - News254')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Trix Editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Trix Editor Dark Theme Styling */
        trix-editor {
            border: 1px solid #4b5563;
            border-radius: 0.5rem;
            padding: 0.75rem;
            min-height: 300px;
            font-family: inherit;
            background: #1f2937;
            color: #f9fafb;
        }
        
        trix-editor:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
        }
        
        trix-toolbar {
            border: 1px solid #4b5563;
            border-bottom: none;
            border-radius: 0.5rem 0.5rem 0 0;
            background: #374151;
        }
        
        trix-toolbar .trix-button-group {
            border-color: #4b5563;
        }
        
        trix-toolbar .trix-button {
            border-color: transparent;
            background: transparent;
            color: #d1d5db;
        }
        
        trix-toolbar .trix-button:hover {
            background: #4b5563;
            color: #f9fafb;
        }
        
        trix-toolbar .trix-button.trix-active {
            background: #10b981;
            color: white;
        }
        
        trix-editor + trix-toolbar {
            border-radius: 0 0 0.5rem 0.5rem;
            border-top: none;
            border-bottom: 1px solid #4b5563;
        }
        
        /* Mobile Responsive Tables */
        @media (max-width: 768px) {
            .mobile-table {
                display: block;
                width: 100%;
                overflow-x: auto;
                white-space: nowrap;
            }
            
            .mobile-card {
                display: block;
                background: #374151;
                border: 1px solid #4b5563;
                border-radius: 0.5rem;
                padding: 1rem;
                margin-bottom: 1rem;
            }
            
            .mobile-card-header {
                font-weight: 600;
                color: #f9fafb;
                margin-bottom: 0.5rem;
            }
            
            .mobile-card-content {
                color: #d1d5db;
                font-size: 0.875rem;
                line-height: 1.25rem;
            }
            
            .mobile-card-actions {
                margin-top: 0.75rem;
                display: flex;
                gap: 0.5rem;
                flex-wrap: wrap;
            }
            
            .mobile-hide {
                display: none;
            }
            
            .mobile-show {
                display: block;
            }
        }
        
        @media (min-width: 769px) {
            .mobile-show {
                display: none;
            }
        }
        
        /* Responsive Text Sizes */
        .responsive-text-xs { font-size: 0.75rem; color: inherit; }
        .responsive-text-sm { font-size: 0.875rem; color: inherit; }
        .responsive-text-base { font-size: 1rem; color: inherit; }
        .responsive-text-lg { font-size: 1.125rem; color: inherit; }
        .responsive-text-xl { font-size: 1.25rem; color: inherit; }
        .responsive-text-2xl { font-size: 1.5rem; color: inherit; }
        .responsive-text-3xl { font-size: 1.875rem; color: inherit; }
        
        @media (max-width: 640px) {
            .responsive-text-xs { font-size: 0.7rem !important; }
            .responsive-text-sm { font-size: 0.8rem !important; }
            .responsive-text-base { font-size: 0.9rem !important; }
            .responsive-text-lg { font-size: 1rem !important; }
            .responsive-text-xl { font-size: 1.1rem !important; }
            .responsive-text-2xl { font-size: 1.25rem !important; }
            .responsive-text-3xl { font-size: 1.5rem !important; }
        }
        
        /* Ensure text visibility */
        .text-white { color: #ffffff !important; }
        .text-gray-400 { color: #9ca3af !important; }
        .bg-white { background-color: #ffffff !important; }
        .bg-opacity-20 { background-color: rgba(255, 255, 255, 0.2) !important; }
        
        /* Mobile Form Improvements */
        @media (max-width: 640px) {
            input, textarea, select {
                font-size: 16px !important; /* Prevents zoom on iOS */
            }
            
            .form-input {
                padding: 0.75rem;
            }
            
            .btn {
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
            }
        }
    </style>
    
    @stack('styles')
    
    <style>
        /* Global image optimization - Dark Theme */
        img {
            max-width: 100%;
            height: auto;
        }
        
        /* News card image containers - Dark Theme */
        .image-container {
            overflow: hidden;
            background-color: #374151;
        }
        
        .image-container img {
            transition: transform 0.3s ease;
        }
        
        .image-container:hover img {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-900 text-white min-h-full">
    <!-- Enhanced Admin Header -->
    <header class="bg-gradient-to-r from-gray-800 to-gray-900 shadow-lg border-b border-gray-700">
        <!-- Top Info Bar -->
        <div class="bg-gray-900 border-b border-gray-700">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-2 text-xs lg:text-sm">
                    <div class="flex items-center space-x-4 text-gray-400">
                        <span class="flex items-center">
                            <svg class="w-3 h-3 lg:w-4 lg:h-4 mr-1 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            System Online
                        </span>
                        <span class="hidden sm:inline">{{ now()->format('M d, Y H:i') }}</span>
                        <span class="hidden md:inline">Server: {{ php_uname('n') }}</span>
                    </div>
                    <div class="flex items-center space-x-3 text-gray-400">
                        <span class="hidden lg:inline">Laravel {{ app()->version() }}</span>
                        <span class="hidden md:inline">PHP {{ PHP_VERSION }}</span>
                        <span class="flex items-center">
                            <svg class="w-3 h-3 lg:w-4 lg:h-4 mr-1 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="hidden sm:inline">{{ config('app.env') === 'production' ? 'Production' : 'Development' }}</span>
                            <span class="sm:hidden">{{ strtoupper(substr(config('app.env'), 0, 4)) }}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Header -->
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3 lg:py-4">
                <div class="flex items-center space-x-2 lg:space-x-4">
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-btn" class="lg:hidden text-gray-300 hover:text-white p-2 rounded-md hover:bg-gray-700 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    <!-- Logo and Brand -->
                    <div class="flex items-center space-x-3">
                        <img src="https://iili.io/FULcRiF.png" alt="News254" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full">
                        <div>
                            <a href="{{ route('admin.dashboard') }}" class="text-lg lg:text-2xl font-bold text-green-400 hover:text-green-300 transition-colors">
                                <span class="hidden sm:inline">News254 Admin</span>
                                <span class="sm:hidden">N254</span>
                            </a>
                            <div class="text-xs text-gray-400 hidden lg:block">Content Management System</div>
                        </div>
                    </div>
                </div>
                
                <!-- Header Stats & Actions -->
                <div class="flex items-center space-x-2 lg:space-x-6">
                    <!-- Quick Stats -->
                    <div class="hidden xl:flex items-center space-x-4 text-sm">
                        <div class="flex items-center space-x-1 text-gray-300">
                            <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ \App\Models\Article::count() }} Articles</span>
                        </div>
                        <div class="flex items-center space-x-1 text-gray-300">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ \App\Models\Comment::where('is_approved', true)->count() }} Comments</span>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.articles.create') }}" 
                           class="hidden md:flex items-center space-x-1 bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>New Article</span>
                        </a>
                        
                        <a href="{{ route('home') }}" target="_blank" 
                           class="hidden sm:flex items-center space-x-1 text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            <span class="hidden lg:inline">View Website</span>
                        </a>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 text-gray-300 hover:text-white bg-gray-700 hover:bg-gray-600 px-3 py-2 rounded-md transition-colors">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white font-medium text-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="hidden sm:block text-left">
                                <div class="text-sm font-medium">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-400">Administrator</div>
                            </div>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div class="absolute right-0 top-full mt-2 w-56 bg-gray-800 rounded-lg shadow-xl border border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-2">
                                <div class="px-4 py-2 border-b border-gray-700">
                                    <div class="text-sm font-medium text-white">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-gray-400">{{ Auth::user()->email }}</div>
                                </div>
                                
                                <a href="{{ route('admin.profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Profile Settings
                                </a>
                                
                                <a href="{{ route('admin.config.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    System Settings
                                </a>
                                
                                <a href="{{ route('home') }}" target="_blank" class="sm:hidden flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    View Website
                                </a>
                                
                                <div class="border-t border-gray-700 mt-2 pt-2">
                                    <form method="POST" action="{{ route('admin.logout') }}" class="block">
                                        @csrf
                                        <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-400 hover:bg-gray-700 hover:text-red-300">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            Sign Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:block py-3 border-t border-gray-700">
                <div class="flex space-x-8">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="text-gray-300 hover:text-green-400 font-medium {{ request()->routeIs('admin.dashboard') ? 'text-green-400' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.articles.index') }}" 
                       class="text-gray-300 hover:text-green-400 font-medium {{ request()->routeIs('admin.articles.*') ? 'text-green-400' : '' }}">
                        Articles
                    </a>
                    <a href="{{ route('admin.categories.index') }}" 
                       class="text-gray-300 hover:text-green-400 font-medium {{ request()->routeIs('admin.categories.*') ? 'text-green-400' : '' }}">
                        Categories
                    </a>
                    <a href="{{ route('admin.authors.index') }}" 
                       class="text-gray-300 hover:text-green-400 font-medium {{ request()->routeIs('admin.authors.*') ? 'text-green-400' : '' }}">
                        Authors
                    </a>
                    <a href="{{ route('admin.comments.index') }}" 
                       class="text-gray-300 hover:text-green-400 font-medium {{ request()->routeIs('admin.comments.*') ? 'text-green-400' : '' }}">
                        Comments
                    </a>
                    <a href="{{ route('admin.analytics.index') }}" 
                       class="text-gray-300 hover:text-green-400 font-medium {{ request()->routeIs('admin.analytics.*') ? 'text-green-400' : '' }}">
                        Analytics
                    </a>
                    <a href="{{ route('admin.config.index') }}" 
                       class="text-gray-300 hover:text-green-400 font-medium {{ request()->routeIs('admin.config.*') ? 'text-green-400' : '' }}">
                        Settings
                    </a>
                </div>
            </nav>
        </div>
        
        <!-- Mobile Navigation -->
        <nav id="mobile-menu" class="lg:hidden hidden bg-gray-700 border-t border-gray-600">
            <div class="px-4 py-2 space-y-1">
                <a href="{{ route('admin.dashboard') }}" 
                   class="block px-3 py-2 text-gray-300 hover:text-green-400 hover:bg-gray-600 rounded-md font-medium {{ request()->routeIs('admin.dashboard') ? 'text-green-400 bg-gray-600' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.articles.index') }}" 
                   class="block px-3 py-2 text-gray-300 hover:text-green-400 hover:bg-gray-600 rounded-md font-medium {{ request()->routeIs('admin.articles.*') ? 'text-green-400 bg-gray-600' : '' }}">
                    Articles
                </a>
                <a href="{{ route('admin.categories.index') }}" 
                   class="block px-3 py-2 text-gray-300 hover:text-green-400 hover:bg-gray-600 rounded-md font-medium {{ request()->routeIs('admin.categories.*') ? 'text-green-400 bg-gray-600' : '' }}">
                    Categories
                </a>
                <a href="{{ route('admin.authors.index') }}" 
                   class="block px-3 py-2 text-gray-300 hover:text-green-400 hover:bg-gray-600 rounded-md font-medium {{ request()->routeIs('admin.authors.*') ? 'text-green-400 bg-gray-600' : '' }}">
                    Authors
                </a>
                <a href="{{ route('admin.comments.index') }}" 
                   class="block px-3 py-2 text-gray-300 hover:text-green-400 hover:bg-gray-600 rounded-md font-medium {{ request()->routeIs('admin.comments.*') ? 'text-green-400 bg-gray-600' : '' }}">
                    Comments
                </a>
                <a href="{{ route('admin.analytics.index') }}" 
                   class="block px-3 py-2 text-gray-300 hover:text-green-400 hover:bg-gray-600 rounded-md font-medium {{ request()->routeIs('admin.analytics.*') ? 'text-green-400 bg-gray-600' : '' }}">
                    Analytics
                </a>
                <a href="{{ route('admin.config.index') }}" 
                   class="block px-3 py-2 text-gray-300 hover:text-green-400 hover:bg-gray-600 rounded-md font-medium {{ request()->routeIs('admin.config.*') ? 'text-green-400 bg-gray-600' : '' }}">
                    Settings
                </a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="px-2 sm:px-4 lg:px-0">
        @if(session('success'))
        <div class="bg-green-600 border border-green-500 text-white px-3 lg:px-4 py-2 lg:py-3 rounded mx-0 lg:mx-4 mt-4 text-sm lg:text-base">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-600 border border-red-500 text-white px-3 lg:px-4 py-2 lg:py-3 rounded mx-0 lg:mx-4 mt-4 text-sm lg:text-base">
            {{ session('error') }}
        </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
    
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
        
        // Trix Editor Configuration
        document.addEventListener('trix-before-initialize', function() {
            // Disable file attachments if needed
            // Trix.config.attachments.preview.caption = {
            //     name: false,
            //     size: false
            // };
        });
        
        // Handle form submission to ensure Trix content is saved
        document.addEventListener('trix-change', function(event) {
            // Content is automatically synced to the hidden input
        });
    </script>
</body>
</html>