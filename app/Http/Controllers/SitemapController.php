<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        // Main sitemap
        $sitemap .= '<sitemap><loc>https://news254.co.ke/sitemap-main.xml</loc><lastmod>' . now()->toISOString() . '</lastmod></sitemap>' . "\n";
        
        // Articles sitemap
        $sitemap .= '<sitemap><loc>https://news254.co.ke/sitemap-articles.xml</loc><lastmod>' . Article::latest('updated_at')->first()?->updated_at?->toISOString() . '</lastmod></sitemap>' . "\n";
        
        $sitemap .= '</sitemapindex>';
        
        return response($sitemap)->header('Content-Type', 'application/xml');
    }

    public function main()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        // Homepage
        $sitemap .= '<url><loc>https://news254.co.ke/</loc><lastmod>' . now()->toISOString() . '</lastmod><changefreq>hourly</changefreq><priority>1.0</priority></url>' . "\n";
        
        // Categories
        foreach (Category::all() as $category) {
            $sitemap .= '<url><loc>https://news254.co.ke/category/' . $category->slug . '</loc><lastmod>' . $category->updated_at->toISOString() . '</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>' . "\n";
        }
        
        // Static pages
        $pages = ['about', 'contact', 'privacy', 'terms'];
        foreach ($pages as $page) {
            $sitemap .= '<url><loc>https://news254.co.ke/' . $page . '</loc><lastmod>' . now()->toISOString() . '</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>' . "\n";
        }
        
        $sitemap .= '</urlset>';
        
        return response($sitemap)->header('Content-Type', 'application/xml');
    }

    public function articles()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">' . "\n";
        
        $articles = Article::published()->latest('published_at')->take(1000)->get();
        
        foreach ($articles as $article) {
            $sitemap .= '<url>' . "\n";
            $sitemap .= '<loc>https://news254.co.ke/article/' . $article->slug . '</loc>' . "\n";
            $sitemap .= '<lastmod>' . $article->updated_at->toISOString() . '</lastmod>' . "\n";
            $sitemap .= '<changefreq>weekly</changefreq>' . "\n";
            $sitemap .= '<priority>0.9</priority>' . "\n";
            
            // Google News specific tags
            if ($article->published_at->isAfter(now()->subDays(2))) {
                $sitemap .= '<news:news>' . "\n";
                $sitemap .= '<news:publication><news:name>News254</news:name><news:language>en</news:language></news:publication>' . "\n";
                $sitemap .= '<news:publication_date>' . $article->published_at->toISOString() . '</news:publication_date>' . "\n";
                $sitemap .= '<news:title>' . htmlspecialchars($article->title) . '</news:title>' . "\n";
                $sitemap .= '<news:keywords>' . htmlspecialchars($article->tags ?? 'Kenya news, ' . $article->category->name) . '</news:keywords>' . "\n";
                $sitemap .= '</news:news>' . "\n";
            }
            
            $sitemap .= '</url>' . "\n";
        }
        
        $sitemap .= '</urlset>';
        
        return response($sitemap)->header('Content-Type', 'application/xml');
    }

    public function robots()
    {
        $robots = "User-agent: *\n";
        $robots .= "Allow: /\n";
        $robots .= "Disallow: /admin/\n";
        $robots .= "Disallow: /login\n";
        $robots .= "Disallow: /register\n\n";
        $robots .= "Sitemap: https://news254.co.ke/sitemap.xml\n";
        $robots .= "Sitemap: https://news254.co.ke/sitemap-articles.xml\n\n";
        $robots .= "Crawl-delay: 1\n";
        
        return response($robots)->header('Content-Type', 'text/plain');
    }
}