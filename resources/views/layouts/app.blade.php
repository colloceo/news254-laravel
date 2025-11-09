<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'News254 - Latest Kenya News | Breaking News, Politics, Business & Sports')</title>
    <meta name="description" content="@yield('description', 'Kenya\'s leading news platform delivering breaking news, politics, business, sports, entertainment and technology updates. Stay informed with News254.co.ke')">
    <meta name="keywords" content="@yield('keywords', 'Kenya news, breaking news Kenya, Nairobi news, Kenya politics, Kenya business, East Africa news, Kenyan headlines')">
    <meta name="author" content="News254">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <meta name="google-site-verification" content="YOUR_VERIFICATION_CODE">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    <!-- Hreflang -->
    <link rel="alternate" hreflang="en-ke" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', 'News254 - Kenya\'s Premier News Platform')">
    <meta property="og:description" content="@yield('og_description', 'Latest breaking news from Kenya. Politics, business, technology, sports, entertainment.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="News254">
    <meta property="og:image" content="@yield('og_image', 'https://news254.co.ke/images/news254-og-image.jpg')">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="en_KE">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@News254kenya">
    <meta name="twitter:creator" content="@News254kenya">
    <meta name="twitter:title" content="@yield('twitter_title', 'News254 - Kenya\'s Premier News Platform')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Latest breaking news from Kenya. Politics, business, technology, sports, entertainment.')">
    <meta name="twitter:image" content="@yield('twitter_image', 'https://news254.co.ke/images/news254-twitter-image.jpg')">
    
    <!-- Favicon and Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="https://iili.io/FULcRiF.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://iili.io/FULcRiF.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://iili.io/FULcRiF.png">
    
    <!-- RSS Feeds -->
    <link rel="alternate" type="application/rss+xml" title="News254 RSS Feed" href="{{ route('rss.main') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- PWA Meta Tags -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#16A34A">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="News254">
    
    <!-- JSON-LD Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "NewsMediaOrganization",
        "name": "News254",
        "url": "https://news254.co.ke",
        "logo": {
            "@type": "ImageObject",
            "url": "https://iili.io/FULcRiF.png",
            "width": 200,
            "height": 200
        },
        "sameAs": [
            "https://www.facebook.com/profile.php?id=61577716408403",
            "https://x.com/News254kenya",
            "https://whatsapp.com/channel/0029VbAVMuk84Om39cyJIB1p"
        ],
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "KE",
            "addressLocality": "Nairobi"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+254751153333",
            "contactType": "customer service",
            "email": "justintech81@gmail.com"
        },
        "description": "Kenya's premier digital news platform delivering breaking news, politics, business, sports, entertainment and technology updates.",
        "foundingDate": "2024",
        "areaServed": {
            "@type": "Country",
            "name": "Kenya"
        }
    }
    </script>
    
    @yield('schema')
    
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    
    <style>
        /* Custom styles for better mobile experience */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .image-container {
            position: relative;
            overflow: hidden;
        }
        
        .image-container img {
            transition: transform 0.3s ease;
        }
        
        .image-container:hover img {
            transform: scale(1.05);
        }
        
        .article-card {
            transition: all 0.3s ease;
        }
        
        .article-card:hover {
            transform: translateY(-5px);
        }
        
        /* Mobile menu styles */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        
        .mobile-menu.open {
            transform: translateX(0);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #16A34A;
            border-radius: 3px;
        }
        
        .dark ::-webkit-scrollbar-track {
            background: #374151;
        }
        
        .dark ::-webkit-scrollbar-thumb {
            background: #22c55e;
        }
        
        /* Animation for breaking news */
        @keyframes pulse-glow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .breaking-pulse {
            animation: pulse-glow 1.5s infinite;
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
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-40">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">N</span>
                        </div>
                        <span class="text-xl font-bold text-green-600 hidden sm:block">News254</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 font-medium">Home</a>
                    @foreach($globalCategories->take(5) as $category)
                    <a href="{{ route('category.show', $category->slug) }}" class="text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 font-medium">{{ $category->name }}</a>
                    @endforeach
                    @if($globalCategories->count() > 5)
                    <div class="relative" id="more-categories-dropdown">
                        <button onclick="toggleMoreCategories()" class="flex items-center space-x-1 text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 font-medium">
                            <span>More</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="more-categories-menu" class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-lg shadow-lg border dark:border-gray-700 z-50 hidden">
                            <div class="grid grid-cols-2 gap-1 p-3">
                                @foreach($globalCategories->skip(5) as $category)
                                <a href="{{ route('category.show', $category->slug) }}" class="px-3 py-2 text-sm text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </nav>
                
                <!-- Search and Dark Mode Toggle -->
                <div class="flex items-center space-x-4">
                    <!-- Search Button -->
                    <button onclick="toggleSearch()" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-search text-gray-600 dark:text-gray-400"></i>
                    </button>
                    
                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-moon text-gray-600 dark:text-gray-400"></i>
                    </button>
                    
                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-bars text-gray-600 dark:text-gray-400"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Search Bar (Hidden by default) -->
        <div id="search-bar" class="hidden border-t dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <form action="{{ route('article.search') }}" method="GET" class="flex">
                    <input type="text" name="q" placeholder="Search news..." 
                           class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-white dark:bg-gray-700 text-black dark:text-white"
                           value="{{ request('q') }}">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-r-lg hover:bg-green-700">
                        Search
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu lg:hidden fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow-lg z-50">
            <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold">N</span>
                        </div>
                        <span class="text-lg font-bold text-green-600">News254</span>
                    </a>
                    <button id="close-menu" class="p-1 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-times text-gray-600 dark:text-gray-400"></i>
                    </button>
                </div>
            </div>
            <nav class="p-4 space-y-4">
                <a href="{{ route('home') }}" class="block py-2 text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 font-medium">Home</a>
                @foreach($globalCategories as $category)
                <a href="{{ route('category.show', $category->slug) }}" class="block py-2 text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 font-medium">{{ $category->name }}</a>
                @endforeach
            </nav>
        </div>
    </header>







    <!-- Main Content -->
    <main class="container mx-auto px-4 py-4 sm:py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">News254</h3>
                    <p class="text-gray-400 mb-4">Kenya's premier news platform delivering accurate and timely news from across the country and beyond.</p>
                    <div class="flex space-x-4">
                        @if($globalContactInfo->facebook_url && $globalContactInfo->facebook_url !== '#')
                        <a href="{{ $globalContactInfo->facebook_url }}" target="_blank" class="text-gray-400 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        @endif
                        @if($globalContactInfo->twitter_url && $globalContactInfo->twitter_url !== '#')
                        <a href="{{ $globalContactInfo->twitter_url }}" target="_blank" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        @endif
                        @if($globalContactInfo->whatsapp_url && $globalContactInfo->whatsapp_url !== '#')
                        <a href="{{ $globalContactInfo->whatsapp_url }}" target="_blank" class="text-gray-400 hover:text-white">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        @endif
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Categories</h4>
                    <ul class="space-y-2">
                        @foreach($globalCategories->take(5) as $category)
                        <li><a href="{{ route('category.show', $category->slug) }}" class="text-gray-400 hover:text-white">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li><a href="{{ route('careers') }}" class="text-gray-400 hover:text-white">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Advertise</a></li>
                        <li><a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Contact Us</h4>
                    <address class="text-gray-400 not-italic">
                        <p class="mb-2">{{ $globalContactInfo->address }}</p>
                        <p class="mb-2">Email: {{ $globalContactInfo->email }}</p>
                        <p class="mb-2">Phone: {{ $globalContactInfo->phone }}</p>
                    </address>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} News254. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenu = document.getElementById('close-menu');
        
        if (mobileMenuButton && mobileMenu && closeMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.add('open');
            });
            
            closeMenu.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                    mobileMenu.classList.remove('open');
                }
            });
        }
        
        // Search toggle functionality
        function toggleSearch() {
            const searchBar = document.getElementById('search-bar');
            if (searchBar) {
                searchBar.classList.toggle('hidden');
                if (!searchBar.classList.contains('hidden')) {
                    const searchInput = searchBar.querySelector('input[name="q"]');
                    if (searchInput) {
                        searchInput.focus();
                    }
                }
            }
        }
        
        // Dark mode toggle
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = themeToggle ? themeToggle.querySelector('i') : null;
        
        // Check for saved theme preference or respect OS preference
        if (localStorage.getItem('color-theme') === 'dark' || 
            (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            if (themeIcon) {
                themeIcon.classList.replace('fa-moon', 'fa-sun');
            }
        } else {
            document.documentElement.classList.remove('dark');
            if (themeIcon) {
                themeIcon.classList.replace('fa-sun', 'fa-moon');
            }
        }
        
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                // Toggle theme
                document.documentElement.classList.toggle('dark');
                
                // Update icon
                if (document.documentElement.classList.contains('dark')) {
                    if (themeIcon) {
                        themeIcon.classList.replace('fa-moon', 'fa-sun');
                    }
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    if (themeIcon) {
                        themeIcon.classList.replace('fa-sun', 'fa-moon');
                    }
                    localStorage.setItem('color-theme', 'light');
                }
            });
        }
        
        // More categories dropdown
        function toggleMoreCategories() {
            const menu = document.getElementById('more-categories-menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        }
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('more-categories-dropdown');
            const menu = document.getElementById('more-categories-menu');
            if (dropdown && menu && !dropdown.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
        
        // Newsletter form submission (if exists)
        const newsletterForm = document.getElementById('newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const form = this;
                const email = document.getElementById('newsletter-email').value;
                const btn = document.getElementById('newsletter-btn');
                const message = document.getElementById('newsletter-message');
                
                // Show loading state
                btn.disabled = true;
                btn.textContent = 'Subscribing...';
                message.classList.add('hidden');
                
                // Simulate API call
                setTimeout(() => {
                    message.textContent = 'Thank you for subscribing to our newsletter!';
                    message.className = 'mt-3 text-sm text-green-200';
                    form.reset();
                    message.classList.remove('hidden');
                    btn.disabled = false;
                    btn.textContent = 'Subscribe';
                    
                    setTimeout(() => {
                        message.classList.add('hidden');
                    }, 5000);
                }, 1500);
            });
        }
        
        // Article preview functionality
        function showPreview(element, title, excerpt, author, date) {
            const preview = document.createElement('div');
            preview.id = 'article-preview';
            preview.className = 'fixed z-50 bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-lg shadow-xl p-4 max-w-sm hidden md:block';
            preview.innerHTML = `
                <h4 class="font-semibold text-black dark:text-white mb-2 line-clamp-2">${title}</h4>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-3">${excerpt}</p>
                <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                    <span>${author}</span>
                    <span>${date}</span>
                </div>
            `;
            
            const rect = element.getBoundingClientRect();
            preview.style.top = (rect.bottom + window.scrollY + 10) + 'px';
            preview.style.left = Math.max(10, Math.min(window.innerWidth - 250, rect.left + window.scrollX - 100)) + 'px';
            
            document.body.appendChild(preview);
        }
        
        function hidePreview() {
            const preview = document.getElementById('article-preview');
            if (preview) {
                preview.remove();
            }
        }
        
        // Add hover events to article links
        document.addEventListener('DOMContentLoaded', function() {
            const previewLinks = document.querySelectorAll('[data-preview]');
            previewLinks.forEach(link => {
                link.addEventListener('mouseenter', function() {
                    const title = this.getAttribute('data-title');
                    const excerpt = this.getAttribute('data-excerpt');
                    const author = this.getAttribute('data-author');
                    const date = this.getAttribute('data-date');
                    if (title && excerpt && author && date) {
                        showPreview(this, title, excerpt, author, date);
                    }
                });
                link.addEventListener('mouseleave', hidePreview);
            });
        });
    </script>
</body>
</html>