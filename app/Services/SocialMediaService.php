<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SocialMediaService
{
    public function shareToFacebook($article)
    {
        try {
            $url = "https://graph.facebook.com/v18.0/me/feed";
            $response = Http::post($url, [
                'message' => $article->title . "\n\n" . $article->excerpt,
                'link' => route('article.show', $article->slug),
                'access_token' => config('services.facebook.access_token')
            ]);
            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Facebook share failed: ' . $e->getMessage());
            return false;
        }
    }

    public function shareToTwitter($article)
    {
        try {
            $tweet = $article->title . " " . route('article.show', $article->slug);
            $url = "https://api.twitter.com/2/tweets";
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.twitter.bearer_token'),
                'Content-Type' => 'application/json',
            ])->post($url, ['text' => $tweet]);
            
            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Twitter share failed: ' . $e->getMessage());
            return false;
        }
    }

    public function generateShareUrls($article)
    {
        $url = route('article.show', $article->slug);
        $title = urlencode($article->title);
        
        return [
            'facebook' => "https://www.facebook.com/sharer/sharer.php?u={$url}",
            'twitter' => "https://twitter.com/intent/tweet?text={$title}&url={$url}",
            'whatsapp' => "https://wa.me/?text={$title} {$url}",
            'linkedin' => "https://www.linkedin.com/sharing/share-offsite/?url={$url}",
        ];
    }
}