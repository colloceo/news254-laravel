<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Error | News254')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://iili.io/FULcRiF.png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'An error occurred on News254 - Kenya\'s Premier News Platform')">
    <meta name="robots" content="noindex, nofollow">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Error | News254')">
    <meta property="og:description" content="@yield('description', 'An error occurred on News254')">
    <meta property="og:image" content="https://iili.io/FULcRiF.png">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="News254">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title', 'Error | News254')">
    <meta name="twitter:description" content="@yield('description', 'An error occurred on News254')">
    <meta name="twitter:image" content="https://iili.io/FULcRiF.png">
    
    <style>
        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            html {
                color-scheme: dark;
            }
        }
        
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        /* Error page specific styles */
        .error-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        .dark .error-container {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
        }
    </style>
</head>
<body class="font-sans antialiased h-full">
    <div class="error-container flex items-center justify-center px-4">
        <div class="fade-in">
            @yield('content')
        </div>
    </div>
    
    <!-- Dark mode toggle script -->
    <script>
        // Check for saved theme preference or default to system preference
        const theme = localStorage.getItem('theme') || 
                     (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
        
        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (!localStorage.getItem('theme')) {
                if (e.matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }
        });
    </script>
</body>
</html>