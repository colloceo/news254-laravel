<div class="bg-gray-800 rounded-lg border border-gray-700 p-3 sm:p-4 lg:p-6">
    <div class="flex justify-between items-center mb-3 sm:mb-4">
        <h2 class="responsive-text-base sm:text-lg font-semibold text-white">Live Statistics</h2>
        <div class="flex items-center text-green-400 responsive-text-sm">
            <div class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-green-400 rounded-full mr-1 sm:mr-2 animate-pulse"></div>
            Live
        </div>
    </div>
    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 sm:gap-4">
        <div class="text-center">
            <div class="responsive-text-lg sm:text-2xl font-bold text-white" id="live-articles">{{ $stats['total_articles'] }}</div>
            <div class="text-gray-400 responsive-text-sm">Total Articles</div>
            <div class="text-green-400 responsive-text-xs mt-1">+{{ $stats['articles_this_month'] }} this month</div>
        </div>
        
        <div class="text-center">
            <div class="text-2xl font-bold text-white" id="live-views">{{ number_format($stats['total_views']) }}</div>
            <div class="text-gray-400 text-sm">Total Views</div>
            <div class="text-blue-400 text-xs mt-1">{{ number_format($performanceMetrics['avg_article_views']) }} avg/article</div>
        </div>
        
        <div class="text-center">
            <div class="text-2xl font-bold text-white" id="live-comments">0</div>
            <div class="text-gray-400 text-sm">Comments Today</div>
            <div class="text-purple-400 text-xs mt-1" id="pending-count">0 pending</div>
        </div>
        
        <div class="text-center">
            <div class="text-2xl font-bold text-white" id="live-growth">{{ number_format($stats['articles_growth'], 1) }}%</div>
            <div class="text-gray-400 text-sm">Weekly Growth</div>
            <div class="text-yellow-400 text-xs mt-1">{{ number_format($performanceMetrics['engagement_rate'], 2) }}% engagement</div>
        </div>
    </div>
    
    <div class="mt-4 pt-4 border-t border-gray-600">
        <div class="flex justify-between items-center">
            <span class="text-gray-400 text-sm">Last updated: <span id="last-updated">{{ now()->format('H:i:s') }}</span></span>
            <button onclick="updateLiveStats()" class="text-green-400 hover:text-green-300 text-sm">
                Update Now
            </button>
        </div>
    </div>
</div>

<script>
function updateLiveStats() {
    fetch('/admin/quick-stats')
        .then(response => response.json())
        .then(data => {
            document.getElementById('live-articles').textContent = data.articles_today || '0';
            document.getElementById('live-views').textContent = (data.views_today || 0).toLocaleString();
            document.getElementById('live-comments').textContent = data.comments_today || '0';
            document.getElementById('pending-count').textContent = (data.pending_comments || 0) + ' pending';
            document.getElementById('last-updated').textContent = new Date().toLocaleTimeString();
        })
        .catch(error => console.error('Error updating stats:', error));
}

// Auto-update every 30 seconds
setInterval(updateLiveStats, 30000);

// Initial update
setTimeout(updateLiveStats, 1000);
</script>