<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'News254 - Kenya\'s Premier News Platform')</title>
    <meta name="description" content="@yield('description', 'Latest breaking news from Kenya. Politics, business, technology, sports, entertainment.')">
    
    <link rel="icon" type="image/png" href="https://iili.io/FULcRiF.png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- PWA Meta Tags -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#16A34A">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="News254">
    <link rel="apple-touch-icon" href="https://iili.io/FULcRiF.png">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        img { max-width: 100%; height: auto; }
        .image-container { overflow: hidden; background-color: #f3f4f6; }
        .image-container img { object-fit: cover; object-position: center; width: 100%; height: 100%; cursor: pointer; }
        .image-container a { display: block; width: 100%; height: 100%; }
        
        /* Focus indicators for accessibility */
        a:focus, button:focus, input:focus, select:focus, textarea:focus {
            outline: 2px solid #16A34A !important;
            outline-offset: 2px !important;
        }
        
        .dark a:focus, .dark button:focus, .dark input:focus, .dark select:focus, .dark textarea:focus {
            outline-color: #22C55E !important;
        }
        
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        
        .animate-marquee {
            animation: marquee 15s linear infinite;
            white-space: nowrap;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 min-h-full">
    <header class="bg-white dark:bg-gray-800 shadow-sm border-b dark:border-gray-700 fixed top-0 left-0 right-0 z-30">
        @if(isset($breakingNews) && $breakingNews)
        <div class="bg-red-600 text-white py-2 overflow-hidden">
            <div class="container mx-auto px-4">
                <div class="flex items-center">
                    <span class="bg-white text-red-600 px-3 py-1 text-sm font-bold rounded mr-4">BREAKING</span>
                    <div class="animate-marquee">
                        <a href="{{ route('article.show', $breakingNews->slug) }}" class="hover:underline">
                            {{ $breakingNews->title }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-2 text-sm text-gray-600 dark:text-gray-300 border-b dark:border-gray-700">
                <div class="flex items-center space-x-4">
                    <span class="hidden sm:inline">{{ now()->format('l, F j, Y') }}</span>
                    <span class="sm:hidden">{{ now()->format('M j, Y') }}</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="https://www.facebook.com/profile.php?id=61577716408403" target="_blank" class="hover:text-blue-600">Facebook</a>
                    <a href="https://x.com/News254kenya" target="_blank" class="hover:text-blue-400">X</a>
                    <a href="https://whatsapp.com/channel/0029VbAVMuk84Om39cyJIB1p" target="_blank" class="hover:text-green-500">WhatsApp</a>
                    <button onclick="toggleDarkMode()" class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-5 h-5 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                        <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center py-4 space-y-4 sm:space-y-0">
                <div class="flex items-center justify-between">
                    <button onclick="toggleSidebar()" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-300 lg:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 ml-2 lg:ml-0">
                        <img src="https://iili.io/FULcRiF.png" alt="News254 Logo" class="w-8 h-8">
                        <span class="text-2xl font-bold text-green-600 dark:text-green-400">News254</span>
                    </a>
                </div>
                
                <div class="w-full sm:w-auto">
                    <form action="{{ route('article.search') }}" method="GET" class="flex">
                        <input type="text" name="q" placeholder="Search news..." 
                               class="flex-1 sm:w-64 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white"
                               value="{{ request('q') }}">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-r-lg hover:bg-green-700">
                            <span class="hidden sm:inline">Search</span>
                            <svg class="w-5 h-5 sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <nav class="hidden lg:block py-3 border-t dark:border-gray-700">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-black dark:text-white hover:text-green-600 dark:hover:text-green-400 font-medium">Home</a>
                    <a href="{{ route('category.show', 'politics') }}" class="text-black dark:text-white hover:text-green-600 dark:hover:text-green-400 font-medium">Politics</a>
                    <a href="{{ route('category.show', 'business') }}" class="text-black dark:text-white hover:text-green-600 dark:hover:text-green-400 font-medium">Business</a>
                    <a href="{{ route('category.show', 'technology') }}" class="text-black dark:text-white hover:text-green-600 dark:hover:text-green-400 font-medium">Technology</a>
                    <a href="{{ route('category.show', 'sports') }}" class="text-black dark:text-white hover:text-green-600 dark:hover:text-green-400 font-medium">Sports</a>
                    <a href="{{ route('category.show', 'entertainment') }}" class="text-black dark:text-white hover:text-green-600 dark:hover:text-green-400 font-medium">Entertainment</a>
                    
                    <!-- More Categories Dropdown -->
                    <div class="relative" id="more-categories-dropdown">
                        <button onclick="toggleMoreCategories()" class="flex items-center space-x-1 text-black dark:text-white hover:text-green-600 dark:hover:text-green-400 font-medium">
                            <span>More</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="more-categories-menu" class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-lg shadow-lg border dark:border-gray-700 z-50 hidden">
                            <div class="grid grid-cols-2 gap-1 p-3">
                                <a href="{{ route('category.show', 'health') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">🏥 Health</a>
                                <a href="{{ route('category.show', 'education') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">📚 Education</a>
                                <a href="{{ route('category.show', 'lifestyle') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">🌟 Lifestyle</a>
                                <a href="{{ route('category.show', 'environment') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">🌱 Environment</a>
                                <a href="{{ route('category.show', 'crime') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">🚔 Crime</a>
                                <a href="{{ route('category.show', 'international') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">🌍 International</a>
                                <a href="{{ route('category.show', 'economy') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">💰 Economy</a>
                                <a href="{{ route('category.show', 'agriculture') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">🌾 Agriculture</a>
                                <a href="{{ route('category.show', 'transport') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">🚗 Transport</a>
                                <a href="{{ route('category.show', 'tourism') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">📸 Tourism</a>
                                <a href="{{ route('category.show', 'weather') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">☁️ Weather</a>
                                <a href="{{ route('category.show', 'opinion') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">💭 Opinion</a>
                                <a href="{{ route('category.show', 'culture') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">🎭 Culture</a>
                                <a href="{{ route('category.show', 'science') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">🔬 Science</a>
                                <a href="{{ route('category.show', 'religion') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">⛪ Religion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>
    <div id="sidebar" class="fixed top-0 left-0 h-full w-80 bg-white dark:bg-gray-800 shadow-lg transform -translate-x-full transition-transform duration-300 z-50 lg:hidden">
        <div class="p-4 border-b dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <img src="https://iili.io/FULcRiF.png" alt="News254 Logo" class="w-6 h-6">
                    <h2 class="text-xl font-bold text-green-600 dark:text-green-400">News254</h2>
                </div>
                <button onclick="toggleSidebar()" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-4 overflow-y-auto h-full">
            <nav class="space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg font-medium">🏠 Home</a>
                <a href="{{ route('category.show', 'politics') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🏛️ Politics</a>
                <a href="{{ route('category.show', 'business') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">💼 Business</a>
                <a href="{{ route('category.show', 'technology') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">💻 Technology</a>
                <a href="{{ route('category.show', 'sports') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">⚽ Sports</a>
                <a href="{{ route('category.show', 'entertainment') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🎬 Entertainment</a>
                <a href="{{ route('category.show', 'health') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🏥 Health</a>
                <a href="{{ route('category.show', 'education') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">📚 Education</a>
                <a href="{{ route('category.show', 'lifestyle') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🌟 Lifestyle</a>
                <a href="{{ route('category.show', 'environment') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🌱 Environment</a>
                <a href="{{ route('category.show', 'crime') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🚔 Crime</a>
                <a href="{{ route('category.show', 'international') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🌍 International</a>
                <a href="{{ route('category.show', 'economy') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">💰 Economy</a>
                <a href="{{ route('category.show', 'agriculture') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🌾 Agriculture</a>
                <a href="{{ route('category.show', 'transport') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🚗 Transport</a>
                <a href="{{ route('category.show', 'tourism') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">📸 Tourism</a>
                <a href="{{ route('category.show', 'weather') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">☁️ Weather</a>
                <a href="{{ route('category.show', 'opinion') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">💭 Opinion</a>
                <a href="{{ route('category.show', 'culture') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🎭 Culture</a>
                <a href="{{ route('category.show', 'science') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">🔬 Science</a>
                <a href="{{ route('category.show', 'religion') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">⛪ Religion</a>
            </nav>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="back-to-top" onclick="scrollToTop()" 
            class="fixed bottom-6 right-6 bg-green-600 text-white p-3 rounded-full shadow-lg hover:bg-green-700 transition-all duration-300 z-40 opacity-0 invisible">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <!-- Onboarding Tour Overlay -->
    <div id="onboarding-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div id="onboarding-tooltip" class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-4 sm:p-6 w-full max-w-xs sm:max-w-sm mx-4">
            <div class="flex justify-between items-start mb-3 sm:mb-4">
                <h3 id="onboarding-title" class="text-base sm:text-lg font-bold text-black dark:text-white pr-2"></h3>
                <button onclick="skipTour()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <p id="onboarding-text" class="text-gray-600 dark:text-gray-300 mb-4 text-sm sm:text-base"></p>
            <div class="flex justify-between items-center">
                <div class="flex space-x-2">
                    <span class="w-2 h-2 bg-green-600 rounded-full" id="step-1"></span>
                    <span class="w-2 h-2 bg-gray-300 dark:bg-gray-600 rounded-full" id="step-2"></span>
                    <span class="w-2 h-2 bg-gray-300 dark:bg-gray-600 rounded-full" id="step-3"></span>
                    <span class="w-2 h-2 bg-gray-300 dark:bg-gray-600 rounded-full" id="step-4"></span>
                </div>
                <div class="flex space-x-2">
                    <button onclick="skipTour()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 text-sm">Skip</button>
                    <button onclick="nextStep()" id="next-btn" class="bg-green-600 text-white px-3 py-1 sm:px-4 sm:py-2 rounded hover:bg-green-700 text-sm">Next</button>
                </div>
            </div>
        </div>
    </div>

    <main style="padding-top: {{ isset($breakingNews) && $breakingNews ? '200px' : '160px' }};">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white mt-12">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <img src="https://iili.io/FULcRiF.png" alt="News254 Logo" class="w-6 h-6">
                        <h3 class="text-xl font-bold text-green-400">News254</h3>
                    </div>
                    <p class="text-gray-300 mb-4">Kenya's premier news platform delivering timely, relevant news.</p>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/profile.php?id=61577716408403" target="_blank" class="text-gray-300 hover:text-white">Facebook</a>
                        <a href="https://x.com/News254kenya" target="_blank" class="text-gray-300 hover:text-white">X</a>
                        <a href="https://whatsapp.com/channel/0029VbAVMuk84Om39cyJIB1p" target="_blank" class="text-gray-300 hover:text-white">WhatsApp</a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Company</h4>
                    <ul class="space-y-2 text-gray-300 text-sm">
                        <li><a href="{{ route('about') }}" class="hover:text-white">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
                        <li><a href="{{ route('privacy') }}" class="hover:text-white">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}" class="hover:text-white">Terms</a></li>
                        <li><a href="{{ route('bookmarks.index') }}" class="hover:text-white">My Bookmarks</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Contact Info</h4>
                    <div class="text-gray-300 space-y-2 text-sm">
                        <p>Email: justintech81@gmail.com</p>
                        <p>Phone: +254 751 153 333</p>
                        <p>Address: Nairobi, Kenya</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300">
                <p class="text-sm">&copy; {{ date('Y') }} News254. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleDarkMode() {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark');
            
            if (isDark) {
                html.classList.remove('dark');
                localStorage.setItem('darkMode', 'false');
            } else {
                html.classList.add('dark');
                localStorage.setItem('darkMode', 'true');
            }
        }
        
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
        
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }
        
        function toggleMoreCategories() {
            const menu = document.getElementById('more-categories-menu');
            menu.classList.toggle('hidden');
        }
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('more-categories-dropdown');
            const menu = document.getElementById('more-categories-menu');
            if (!dropdown.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
        
        // Back to top functionality
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('back-to-top');
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('opacity-0', 'invisible');
                backToTop.classList.add('opacity-100', 'visible');
            } else {
                backToTop.classList.add('opacity-0', 'invisible');
                backToTop.classList.remove('opacity-100', 'visible');
            }
        });
        
        // Onboarding Tour
        let currentStep = 0;
        const tourSteps = [
            {
                title: 'Welcome to News254!',
                text: 'Kenya\'s premier news platform. Let us show you around.',
                target: null
            },
            {
                title: 'Search News',
                text: 'Use the search bar to find specific articles or topics.',
                target: 'input[name="q"]'
            },
            {
                title: 'Browse Categories',
                text: 'Click the hamburger menu or "More" to explore all news categories.',
                target: window.innerWidth < 1024 ? 'button[onclick="toggleSidebar()"]' : '#more-categories-dropdown'
            },
            {
                title: 'Dark Mode',
                text: 'Toggle between light and dark themes for comfortable reading.',
                target: 'button[onclick="toggleDarkMode()"]'
            }
        ];
        
        function startTour() {
            if (localStorage.getItem('tourCompleted') === 'true') return;
            
            currentStep = 0;
            document.getElementById('onboarding-overlay').classList.remove('hidden');
            showStep(currentStep);
        }
        
        function showStep(step) {
            const stepData = tourSteps[step];
            document.getElementById('onboarding-title').textContent = stepData.title;
            document.getElementById('onboarding-text').textContent = stepData.text;
            
            // Update step indicators
            for (let i = 1; i <= 4; i++) {
                const indicator = document.getElementById(`step-${i}`);
                if (i <= step + 1) {
                    indicator.classList.remove('bg-gray-300', 'dark:bg-gray-600');
                    indicator.classList.add('bg-green-600');
                } else {
                    indicator.classList.remove('bg-green-600');
                    indicator.classList.add('bg-gray-300', 'dark:bg-gray-600');
                }
            }
            
            // Center tooltip for mobile responsiveness
            const tooltip = document.getElementById('onboarding-tooltip');
            tooltip.style.position = 'relative';
            tooltip.style.top = 'auto';
            tooltip.style.left = 'auto';
            tooltip.style.transform = 'none';
            
            // Update button text
            const nextBtn = document.getElementById('next-btn');
            nextBtn.textContent = step === tourSteps.length - 1 ? 'Finish' : 'Next';
        }
        
        function nextStep() {
            if (currentStep < tourSteps.length - 1) {
                currentStep++;
                showStep(currentStep);
            } else {
                skipTour();
            }
        }
        
        function skipTour() {
            document.getElementById('onboarding-overlay').classList.add('hidden');
            localStorage.setItem('tourCompleted', 'true');
        }
        
        // Start tour after page load
        window.addEventListener('load', function() {
            setTimeout(startTour, 1000);
        });
        
        // PWA Installation
        let deferredPrompt;
        
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            
            // Show install button
            const installBtn = document.createElement('button');
            installBtn.innerHTML = `
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Install App
            `;
            installBtn.className = 'fixed bottom-20 right-6 bg-green-600 text-white px-4 py-3 rounded-full shadow-lg hover:bg-green-700 transition-all duration-300 z-40 flex items-center text-sm font-medium';
            installBtn.id = 'install-btn';
            
            installBtn.addEventListener('click', () => {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the install prompt');
                    }
                    deferredPrompt = null;
                    installBtn.remove();
                });
            });
            
            document.body.appendChild(installBtn);
            
            // Auto-hide after 10 seconds
            setTimeout(() => {
                if (installBtn && installBtn.parentNode) {
                    installBtn.remove();
                }
            }, 10000);
        });
        
        // Register Service Worker
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('SW registered: ', registration);
                        
                        // Request notification permission
                        if ('Notification' in window && 'PushManager' in window) {
                            requestNotificationPermission();
                        }
                    })
                    .catch(registrationError => {
                        console.log('SW registration failed: ', registrationError);
                    });
            });
        }
        
        // Push Notifications
        function requestNotificationPermission() {
            if (Notification.permission === 'default') {
                setTimeout(() => {
                    if (localStorage.getItem('notificationPromptShown') !== 'true') {
                        showNotificationPrompt();
                    }
                }, 5000);
            }
        }
        
        function showNotificationPrompt() {
            const prompt = document.createElement('div');
            prompt.className = 'fixed top-4 right-4 bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-lg shadow-xl p-4 max-w-sm z-50';
            prompt.innerHTML = `
                <div class="flex items-start space-x-3">
                    <div class="bg-green-600 p-2 rounded-full">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM9 7H4l5-5v5z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-black dark:text-white mb-1">Stay Updated</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">Get notified about breaking news from Kenya</p>
                        <div class="flex space-x-2">
                            <button onclick="enableNotifications()" class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">Enable</button>
                            <button onclick="dismissNotificationPrompt()" class="text-gray-500 hover:text-gray-700 px-3 py-1 rounded text-sm">Later</button>
                        </div>
                    </div>
                    <button onclick="dismissNotificationPrompt()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `;
            
            document.body.appendChild(prompt);
            localStorage.setItem('notificationPromptShown', 'true');
            
            setTimeout(() => {
                if (prompt.parentNode) {
                    prompt.remove();
                }
            }, 10000);
        }
        
        function enableNotifications() {
            Notification.requestPermission().then(permission => {
                if (permission === 'granted') {
                    new Notification('News254 Notifications Enabled!', {
                        body: 'You will now receive breaking news alerts from Kenya.',
                        icon: 'https://iili.io/FULcRiF.png',
                        badge: 'https://iili.io/FULcRiF.png'
                    });
                }
                dismissNotificationPrompt();
            });
        }
        
        function dismissNotificationPrompt() {
            const prompt = document.querySelector('.fixed.top-4.right-4');
            if (prompt) {
                prompt.remove();
            }
        }
    </script>
</body>
</html>