<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Response;

class NewsSitemapController extends Controller
{
    public function newsSitemap()
    {
        $articles = Article::where('published_at', '>=', now()->subDays(2))
                          ->orderBy('published_at', 'desc')
                          ->limit(1000)
                          ->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">' . "\n";

        foreach ($articles as $article) {
            $xml .= '<url>' . "\n";
            $xml .= '<loc>' . route('article.show', $article->slug) . '</loc>' . "\n";
            $xml .= '<news:news>' . "\n";
            $xml .= '<news:publication>' . "\n";
            $xml .= '<news:name>News254</news:name>' . "\n";
            $xml .= '<news:language>en</news:language>' . "\n";
            $xml .= '</news:publication>' . "\n";
            $xml .= '<news:publication_date>' . $article->published_at->toISOString() . '</news:publication_date>' . "\n";
            $xml .= '<news:title>' . htmlspecialchars($article->title) . '</news:title>' . "\n";
            $xml .= '</news:news>' . "\n";
            $xml .= '</url>' . "\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}