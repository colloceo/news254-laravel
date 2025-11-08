<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::first();
        return view('admin.contact-info.index', compact('contactInfo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'tips_email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'whatsapp_url' => 'nullable|url|max:255',
            'office_hours' => 'nullable|string|max:500',
        ]);

        $contactInfo = ContactInfo::first();
        
        if ($contactInfo) {
            $contactInfo->update($request->all());
        } else {
            ContactInfo::create($request->all());
        }

        return redirect()->route('admin.contact-info.index')->with('success', 'Contact information updated successfully.');
    }
}