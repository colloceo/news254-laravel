@extends('layouts.admin')

@section('title', 'Analytics - News254 Admin')

@section('content')
<div class="container mx-auto px-0 lg:px-4 py-4 lg:py-8">
    <div class="mb-6 lg:mb-8">
        <h1 class="text-2xl lg:text-3xl font-bold text-white">Analytics Dashboard</h1>
        <p class="text-gray-400 text-sm lg:text-base">Comprehensive site analytics and performance metrics</p>
    </div>

    <!-- Overview Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-6 mb-6 lg:mb-8">
        <div class="bg-gray-800 rounded-lg p-3 lg:p-6 border border-gray-700">
            <div class="flex items-center">
                <div class="p-1.5 lg:p-2 bg-blue-600 rounded-lg">
                    <svg class="w-4 h-4 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <div class="ml-2 lg:ml-4">
                    <p class="text-xs lg:text-sm font-medium text-gray-400">Total Views</p>
                    <p class="text-lg lg:text-2xl font-semibold text-white">{{ number_format($analytics['overview']['total_views']) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg p-3 lg:p-6 border border-gray-700">
            <div class="flex items-center">
                <div class="p-1.5 lg:p-2 bg-green-600 rounded-lg">
                    <svg class="w-4 h-4 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <div class="ml-2 lg:ml-4">
                    <p class="text-xs lg:text-sm font-medium text-gray-400">Avg Views/Article</p>
                    <p class="text-lg lg:text-2xl font-semibold text-white">{{ number_format($analytics['overview']['avg_views_per_article']) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg p-3 lg:p-6 border border-gray-700">
            <div class="flex items-center">
                <div class="p-1.5 lg:p-2 bg-purple-600 rounded-lg">
                    <svg class="w-4 h-4 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div class="ml-2 lg:ml-4">
                    <p class="text-xs lg:text-sm font-medium text-gray-400">Engagement Rate</p>
                    <p class="text-lg lg:text-2xl font-semibold text-white">{{ number_format($analytics['engagement']['engagement_rate'], 2) }}%</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg p-3 lg:p-6 border border-gray-700">
            <div class="flex items-center">
                <div class="p-1.5 lg:p-2 bg-yellow-600 rounded-lg">
                    <svg class="w-4 h-4 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <div class="ml-2 lg:ml-4">
                    <p class="text-xs lg:text-sm font-medium text-gray-400">Weekly Growth</p>
                    <p class="text-lg lg:text-2xl font-semibold text-white">{{ number_format($analytics['trends']['weekly_growth'], 1) }}%</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8 mb-6 lg:mb-8">
        <!-- Traffic Chart -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
            <h2 class="text-lg font-semibold text-white mb-4">Daily Views (Last 30 Days)</h2>
            <div class="relative h-48 lg:h-64">
                <canvas id="trafficChart" class="w-full h-full"></canvas>
            </div>
        </div>

        <!-- Category Distribution -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
            <h2 class="text-lg font-semibold text-white mb-4">Articles by Category</h2>
            <div class="relative h-48 lg:h-64">
                <canvas id="categoryChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-8">
        <!-- Top Articles -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
            <h2 class="text-lg font-semibold text-white mb-4">Top Articles</h2>
            <div class="space-y-3">
                @foreach($analytics['traffic']['top_articles']->take(5) as $article)
                <div class="flex justify-between items-center">
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm truncate">{{ Str::limit($article->title, 30) }}</p>
                        <p class="text-gray-400 text-xs">{{ number_format($article->views) }} views</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Category Performance -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
            <h2 class="text-lg font-semibold text-white mb-4">Category Performance</h2>
            <div class="space-y-3">
                @foreach($analytics['categories']->take(5) as $category)
                <div class="flex justify-between items-center">
                    <div class="flex-1">
                        <p class="text-white text-sm">{{ $category->name }}</p>
                        <p class="text-gray-400 text-xs">{{ $category->articles_count }} articles</p>
                    </div>
                    <div class="text-right">
                        <p class="text-white text-sm">{{ number_format($category->articles_sum_views ?? 0) }}</p>
                        <p class="text-gray-400 text-xs">views</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Engagement Stats -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 lg:p-6">
            <h2 class="text-lg font-semibold text-white mb-4">Engagement</h2>
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-400 text-sm">Comments/Article</span>
                    <span class="text-white">{{ number_format($analytics['engagement']['comments_per_article'], 1) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400 text-sm">Approved Comments</span>
                    <span class="text-white">{{ $analytics['engagement']['approved_comments'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400 text-sm">Pending Comments</span>
                    <span class="text-white">{{ $analytics['engagement']['pending_comments'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400 text-sm">This Month Articles</span>
                    <span class="text-white">{{ $analytics['overview']['articles_this_month'] }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Traffic Chart
const trafficCtx = document.getElementById('trafficChart').getContext('2d');
new Chart(trafficCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode($analytics['traffic']['daily_views']->pluck('date')) !!},
        datasets: [{
            label: 'Daily Views',
            data: {!! json_encode($analytics['traffic']['daily_views']->pluck('views')) !!},
            borderColor: '#10b981',
            backgroundColor: 'rgba(16, 185, 129, 0.1)',
            tension: 0.4,
            fill: true,
            pointRadius: window.innerWidth < 768 ? 2 : 3
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: {
            intersect: false,
            mode: 'index'
        },
        plugins: {
            legend: { 
                labels: { 
                    color: '#f9fafb',
                    font: { size: window.innerWidth < 768 ? 10 : 12 }
                }
            }
        },
        scales: {
            x: { 
                ticks: { 
                    color: '#9ca3af',
                    font: { size: window.innerWidth < 768 ? 9 : 11 },
                    maxTicksLimit: window.innerWidth < 768 ? 6 : 10
                }, 
                grid: { color: '#374151' }
            },
            y: { 
                ticks: { 
                    color: '#9ca3af',
                    font: { size: window.innerWidth < 768 ? 9 : 11 }
                }, 
                grid: { color: '#374151' }
            }
        }
    }
});

// Category Chart
const categoryCtx = document.getElementById('categoryChart').getContext('2d');
new Chart(categoryCtx, {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($analytics['categories']->pluck('name')) !!},
        datasets: [{
            data: {!! json_encode($analytics['categories']->pluck('articles_count')) !!},
            backgroundColor: [
                '#ef4444', '#f97316', '#eab308', '#22c55e', '#06b6d4',
                '#3b82f6', '#8b5cf6', '#ec4899', '#f59e0b', '#10b981'
            ],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: window.innerWidth < 768 ? '50%' : '60%',
        plugins: {
            legend: { 
                labels: { 
                    color: '#f9fafb',
                    font: { size: window.innerWidth < 768 ? 10 : 12 },
                    padding: window.innerWidth < 768 ? 10 : 15,
                    usePointStyle: true,
                    pointStyle: 'circle'
                },
                position: window.innerWidth < 768 ? 'bottom' : 'right',
                maxWidth: window.innerWidth < 768 ? 200 : 150
            },
            tooltip: {
                titleFont: { size: window.innerWidth < 768 ? 11 : 13 },
                bodyFont: { size: window.innerWidth < 768 ? 10 : 12 }
            }
        }
    }
});
</script>
@endsection