<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = [
            'site_name' => config('app.name', 'News254'),
            'site_description' => 'Kenya\'s Premier News Platform',
            'site_keywords' => 'Kenya news, politics, business, technology, sports',
            'articles_per_page' => 12,
            'featured_articles_count' => 6,
            'related_articles_count' => 4,
            'cache_duration' => 3600,
            'comments_enabled' => true,
            'auto_approve_comments' => false,
            'breaking_news_enabled' => true,
            'analytics_enabled' => true,
            'social_sharing_enabled' => true,
            'ads_enabled' => true,
            'maintenance_mode' => false,
        ];

        return view('admin.config.index', compact('configs'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_url' => 'required|url',
        ]);

        // In a real application, you'd update configuration files or database settings
        // For now, we'll just show a success message
        
        return redirect()->route('admin.config.index')
            ->with('success', 'Configuration updated successfully!');
    }

    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');

            return redirect()->route('admin.config.index')
                ->with('success', 'Cache cleared successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.config.index')
                ->with('error', 'Failed to clear cache: ' . $e->getMessage());
        }
    }
}