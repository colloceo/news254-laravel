<div class="bg-gray-800 rounded-lg border border-gray-700 p-3 sm:p-4 lg:p-6">
    <h2 class="responsive-text-base sm:text-lg font-semibold text-white mb-3 sm:mb-4">Quick Actions</h2>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 sm:gap-3">
        <a href="{{ route('admin.articles.create') }}" 
           class="bg-green-600 text-white p-2 sm:p-3 rounded-lg hover:bg-green-700 transition-colors text-center group">
            <svg class="w-4 h-4 sm:w-6 sm:h-6 mx-auto mb-1 sm:mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span class="responsive-text-xs sm:text-sm font-medium">New Article</span>
        </a>
        
        <button onclick="showBulkActions()" 
                class="bg-blue-600 text-white p-2 sm:p-3 rounded-lg hover:bg-blue-700 transition-colors text-center group">
            <svg class="w-4 h-4 sm:w-6 sm:h-6 mx-auto mb-1 sm:mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            <span class="responsive-text-xs sm:text-sm font-medium">Bulk Edit</span>
        </button>
        
        <button onclick="refreshDashboard()" 
                class="bg-purple-600 text-white p-3 rounded-lg hover:bg-purple-700 transition-colors text-center group">
            <svg class="w-6 h-6 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span class="text-sm font-medium">Refresh</span>
        </button>
        
        <a href="{{ route('home') }}" target="_blank"
           class="bg-gray-600 text-white p-3 rounded-lg hover:bg-gray-700 transition-colors text-center group">
            <svg class="w-6 h-6 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
            <span class="text-sm font-medium">View Site</span>
        </a>
    </div>
</div>

<script>
function showBulkActions() {
    // Show bulk actions modal or redirect to bulk edit page
    window.location.href = '{{ route("admin.articles.index") }}?bulk=true';
}

function refreshDashboard() {
    location.reload();
}
</script>