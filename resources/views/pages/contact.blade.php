@extends('layouts.app')

@section('title', 'Contact Us - News254')
@section('description', 'Get in touch with News254. Send us your story tips, feedback, or inquiries.')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-600 text-white rounded-lg mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Contact Us</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">We'd love to hear from you</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 dark:bg-green-900 p-2 rounded-lg mr-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Send us a Message</h2>
                    </div>
                    <form id="contact-form" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                                <input type="text" id="name" name="name" required
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                            <select id="subject" name="subject" required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                                <option value="">Select a subject</option>
                                <option value="story-tip">Story Tip</option>
                                <option value="feedback">Feedback</option>
                                <option value="partnership">Partnership</option>
                                <option value="careers">Careers</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                            <textarea id="message" name="message" rows="5" required
                                      class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white"
                                      placeholder="Tell us more about your inquiry..."></textarea>
                        </div>
                        <button type="submit" id="contact-btn"
                                class="w-full bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors font-medium">
                            Send Message
                        </button>
                        <div id="contact-message" class="mt-3 text-sm hidden"></div>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-6">
                    <!-- Contact Details -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-6">
                            <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-lg mr-3">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Get in Touch</h2>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="bg-green-100 dark:bg-green-900 text-green-600 rounded-lg p-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900 dark:text-white">Email</h3>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $contactInfo->email }}</p>
                                    @if($contactInfo->tips_email)
                                    <p class="text-gray-600 dark:text-gray-400">{{ $contactInfo->tips_email }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="bg-blue-100 dark:bg-blue-900 text-blue-600 rounded-lg p-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900 dark:text-white">Phone</h3>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $contactInfo->phone }}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="bg-purple-100 dark:bg-purple-900 text-purple-600 rounded-lg p-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900 dark:text-white">Address</h3>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $contactInfo->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-orange-100 dark:bg-orange-900 p-2 rounded-lg mr-3">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Follow Us</h2>
                        </div>
                        <div class="flex space-x-3">
                            @if($contactInfo->twitter_url && $contactInfo->twitter_url !== '#')
                            <a href="{{ $contactInfo->twitter_url }}" target="_blank" class="bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            @endif
                            @if($contactInfo->facebook_url && $contactInfo->facebook_url !== '#')
                            <a href="{{ $contactInfo->facebook_url }}" target="_blank" class="bg-blue-800 text-white p-3 rounded-lg hover:bg-blue-900 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            @endif
                            @if($contactInfo->whatsapp_url && $contactInfo->whatsapp_url !== '#')
                            <a href="{{ $contactInfo->whatsapp_url }}" target="_blank" class="bg-green-500 text-white p-3 rounded-lg hover:bg-green-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.085"/>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Office Hours -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-indigo-100 dark:bg-indigo-900 p-2 rounded-lg mr-3">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Office Hours</h2>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 whitespace-pre-line">
                            {{ $contactInfo->office_hours ?: "Monday - Friday: 8:00 AM - 6:00 PM\nSaturday: 9:00 AM - 2:00 PM\nSunday: Closed" }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const btn = document.getElementById('contact-btn');
    const message = document.getElementById('contact-message');
    const formData = new FormData(form);
    
    btn.disabled = true;
    btn.textContent = 'Sending...';
    message.classList.add('hidden');
    
    fetch('{{ route("contact.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            message.className = 'mt-3 text-sm text-green-600 dark:text-green-400';
            message.textContent = data.message;
            form.reset();
        } else {
            message.className = 'mt-3 text-sm text-red-600 dark:text-red-400';
            message.textContent = 'Something went wrong. Please try again.';
        }
        message.classList.remove('hidden');
    })
    .catch(error => {
        message.className = 'mt-3 text-sm text-red-600 dark:text-red-400';
        message.textContent = 'Something went wrong. Please try again.';
        message.classList.remove('hidden');
    })
    .finally(() => {
        btn.disabled = false;
        btn.textContent = 'Send Message';
    });
});
</script>
@endsection