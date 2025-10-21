<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $subscriber = NewsletterSubscriber::firstOrCreate(
            ['email' => $request->email],
            ['is_active' => true]
        );

        if ($subscriber->wasRecentlyCreated) {
            return response()->json(['success' => true, 'message' => 'Successfully subscribed!']);
        }

        return response()->json(['success' => false, 'message' => 'Already subscribed!']);
    }

    public function unsubscribe(Request $request)
    {
        NewsletterSubscriber::where('email', $request->email)->update(['is_active' => false]);
        return response()->json(['success' => true, 'message' => 'Unsubscribed successfully!']);
    }
}