@extends('layouts.admin')

@section('title', 'Contact Information')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Contact Information</h1>
            <p class="text-gray-600 dark:text-gray-400">Manage site contact details and social media links</p>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <form action="{{ route('admin.contact-info.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Contact Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Main Email</label>
                    <input type="email" id="email" name="email" required
                           value="{{ old('email', $contactInfo->email ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="tips_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tips Email</label>
                    <input type="email" id="tips_email" name="tips_email"
                           value="{{ old('tips_email', $contactInfo->tips_email ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                    @error('tips_email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                    <input type="text" id="phone" name="phone" required
                           value="{{ old('phone', $contactInfo->phone ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Address</label>
                    <input type="text" id="address" name="address" required
                           value="{{ old('address', $contactInfo->address ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Social Media Links -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Social Media Links</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="facebook_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Facebook URL</label>
                        <input type="url" id="facebook_url" name="facebook_url"
                               value="{{ old('facebook_url', $contactInfo->facebook_url ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                        @error('facebook_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="twitter_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Twitter/X URL</label>
                        <input type="url" id="twitter_url" name="twitter_url"
                               value="{{ old('twitter_url', $contactInfo->twitter_url ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                        @error('twitter_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="whatsapp_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">WhatsApp URL</label>
                        <input type="url" id="whatsapp_url" name="whatsapp_url"
                               value="{{ old('whatsapp_url', $contactInfo->whatsapp_url ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                        @error('whatsapp_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Office Hours -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                <div>
                    <label for="office_hours" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Office Hours</label>
                    <textarea id="office_hours" name="office_hours" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white"
                              placeholder="Monday - Friday: 8:00 AM - 6:00 PM&#10;Saturday: 9:00 AM - 2:00 PM&#10;Sunday: Closed">{{ old('office_hours', $contactInfo->office_hours ?? '') }}</textarea>
                    @error('office_hours')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors font-medium">
                    Update Contact Information
                </button>
            </div>
        </form>
    </div>
</div>
@endsection