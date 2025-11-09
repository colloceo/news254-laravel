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
                
                <div class="relative" id="more-categories-dropdown">
                    <button onclick="toggleMoreCategories()" class="flex items-center space-x-1 text-black dark:text-white hover:text-green-600 dark:hover:text-green-400 font-medium">
                        <span>More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="more-categories-menu" class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-lg shadow-lg border dark:border-gray-700 z-50 hidden">
                        <div class="grid grid-cols-2 gap-1 p-3">
                            <a href="{{ route('category.show', 'health') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded"><i class="fas fa-heartbeat mr-2"></i>Health</a>
                            <a href="{{ route('category.show', 'education') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded"><i class="fas fa-graduation-cap mr-2"></i>Education</a>
                            <a href="{{ route('category.show', 'lifestyle') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded"><i class="fas fa-star mr-2"></i>Lifestyle</a>
                            <a href="{{ route('category.show', 'environment') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded"><i class="fas fa-leaf mr-2"></i>Environment</a>
                            <a href="{{ route('category.show', 'crime') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded"><i class="fas fa-shield-alt mr-2"></i>Crime</a>
                            <a href="{{ route('category.show', 'international') }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded"><i class="fas fa-globe mr-2"></i>International</a>
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
            <a href="{{ route('home') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg font-medium"><i class="fas fa-home mr-3"></i>Home</a>
            <a href="{{ route('category.show', 'politics') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-landmark mr-3"></i>Politics</a>
            <a href="{{ route('category.show', 'business') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-briefcase mr-3"></i>Business</a>
            <a href="{{ route('category.show', 'technology') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-laptop mr-3"></i>Technology</a>
            <a href="{{ route('category.show', 'sports') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-futbol mr-3"></i>Sports</a>
            <a href="{{ route('category.show', 'entertainment') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-film mr-3"></i>Entertainment</a>
            <a href="{{ route('category.show', 'health') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-heartbeat mr-3"></i>Health</a>
            <a href="{{ route('category.show', 'education') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-graduation-cap mr-3"></i>Education</a>
            <a href="{{ route('category.show', 'lifestyle') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-star mr-3"></i>Lifestyle</a>
            <a href="{{ route('category.show', 'environment') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-leaf mr-3"></i>Environment</a>
            <a href="{{ route('category.show', 'crime') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-shield-alt mr-3"></i>Crime</a>
            <a href="{{ route('category.show', 'international') }}" class="block px-4 py-3 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><i class="fas fa-globe mr-3"></i>International</a>
        </nav>
    </div>
</div>