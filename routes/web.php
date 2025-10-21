<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');

// Article Routes
Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/search', [ArticleController::class, 'search'])->name('article.search');
Route::post('/article/{slug}/comment', [ArticleController::class, 'storeComment'])->name('article.comment')->withoutMiddleware(['web']);

// Category Routes
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

// Bookmark Routes
Route::post('/bookmarks/toggle', [App\Http\Controllers\BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
Route::get('/bookmarks', [App\Http\Controllers\BookmarkController::class, 'index'])->name('bookmarks.index');
Route::post('/bookmarks/clear', function() {
    session()->forget('bookmarks');
    return response()->json(['success' => true]);
})->name('bookmarks.clear');

// Management System Routes (Completely Hidden)
Route::prefix('sys-mgmt-x7k9')->name('admin.')->middleware('hide.admin')->group(function () {
    // Guest routes (not authenticated)
    Route::middleware('guest')->group(function () {
        Route::get('/auth-portal', [App\Http\Controllers\Admin\AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/auth-portal', [App\Http\Controllers\Admin\AdminAuthController::class, 'login']);
    });
    
    // Logout route (for authenticated users)
    Route::post('/terminate-session', [App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('logout');
    
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/control-center', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('content-mgmt', AdminArticleController::class)->names('articles');
        Route::post('/content-mgmt/{article}/quick-update', [AdminArticleController::class, 'quickUpdate'])->name('articles.quick-update');
        Route::resource('taxonomy', AdminCategoryController::class)->names('categories');
        Route::resource('contributors', AdminAuthorController::class)->names('authors');
        Route::resource('feedback', AdminCommentController::class)->only(['index', 'show', 'destroy'])->names('comments');
        Route::post('/feedback/{comment}/approve', [AdminCommentController::class, 'approve'])->name('comments.approve');
        Route::post('/feedback/{comment}/reject', [AdminCommentController::class, 'reject'])->name('comments.reject');
        Route::post('/media-upload', [App\Http\Controllers\Admin\ImageController::class, 'upload'])->name('upload.image');
        Route::get('/user-settings', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/user-settings', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
        Route::put('/user-settings/security', [App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('profile.password');
        
        // Analytics
        Route::get('/metrics', [App\Http\Controllers\Admin\AnalyticsController::class, 'index'])->name('analytics.index');
        
        // Configuration
        Route::get('/system-config', [App\Http\Controllers\Admin\ConfigController::class, 'index'])->name('config.index');
        Route::put('/system-config', [App\Http\Controllers\Admin\ConfigController::class, 'update'])->name('config.update');
        Route::get('/system-config/cache-flush', [App\Http\Controllers\Admin\ConfigController::class, 'clearCache'])->name('config.clear-cache');
        
        // Site Management
        Route::get('/diagnostics/info', [App\Http\Controllers\Admin\SiteController::class, 'systemInfo'])->name('site.system-info');
        Route::get('/diagnostics/export', [App\Http\Controllers\Admin\SiteController::class, 'backup'])->name('site.backup');
        
        // Interactive Dashboard
        Route::get('/live-data', [App\Http\Controllers\Admin\DashboardController::class, 'quickStats']);
        Route::post('/batch-ops', [App\Http\Controllers\Admin\DashboardController::class, 'bulkActions']);
        Route::get('/content-search', [App\Http\Controllers\Admin\DashboardController::class, 'searchContent']);
    });
});

// Authentication Routes (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Newsletter Routes
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/newsletter/unsubscribe', [App\Http\Controllers\NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// RSS Routes
Route::get('/rss', [App\Http\Controllers\RssController::class, 'feed'])->name('rss.feed');
Route::get('/rss/category/{slug}', [App\Http\Controllers\RssController::class, 'categoryFeed'])->name('rss.category');

// SEO Routes
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);
Route::get('/sitemap-main.xml', [App\Http\Controllers\SitemapController::class, 'main']);
Route::get('/sitemap-articles.xml', [App\Http\Controllers\SitemapController::class, 'articles']);
Route::get('/robots.txt', function() {
    return response("User-agent: *\nDisallow: /sys-mgmt-x7k9/\nDisallow: /sys-mgmt-x7k9/*\n\nSitemap: " . url('/sitemap.xml'))
        ->header('Content-Type', 'text/plain');
});