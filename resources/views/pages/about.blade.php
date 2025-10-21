@extends('layouts.app')

@section('title', 'About Us - News254')
@section('description', 'Learn about News254 - Kenya\'s premier news platform dedicated to delivering timely, accurate, and relevant news coverage.')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">About News254</h1>
            <p class="text-xl text-gray-600">Kenya's Premier News Platform</p>
        </div>

        <!-- Hero Image -->
        <div class="mb-12">
            <img src="https://images.pexels.com/photos/6077326/pexels-photo-6077326.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                 alt="News254 Team" 
                 class="w-full h-64 object-cover rounded-lg shadow-lg">
        </div>

        <!-- Mission & Vision -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-green-600 mb-4">Our Mission</h2>
                <p class="text-gray-700">
                    To deliver timely, accurate, and relevant news that keeps Kenyans informed and empowered to make better decisions about their lives, communities, and country.
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-green-600 mb-4">Our Vision</h2>
                <p class="text-gray-700">
                    To be Kenya's most trusted and comprehensive digital news platform, setting the standard for quality journalism and community engagement.
                </p>
            </div>
        </div>

        <!-- Story -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Story</h2>
            <div class="prose prose-lg max-w-none">
                <p>
                    News254 was founded with a simple yet powerful vision: to create a news platform that truly serves the Kenyan people. In an era of information overload and misinformation, we recognized the need for a reliable, comprehensive, and accessible source of news that covers the issues that matter most to Kenyans.
                </p>
                <p>
                    Our journey began with a small team of passionate journalists and technologists who believed that quality journalism could thrive in the digital age. We started by focusing on the stories that mainstream media often overlooked – the local politics that affect daily life, the business developments that impact livelihoods, and the technological innovations that are shaping Kenya's future.
                </p>
                <p>
                    Today, News254 has grown into Kenya's premier digital news platform, serving thousands of readers daily with comprehensive coverage across politics, business, technology, sports, entertainment, and lifestyle. Our commitment to accuracy, timeliness, and relevance has earned us the trust of readers across the country and beyond.
                </p>
            </div>
        </div>

        <!-- Team -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Meet Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <img src="https://images.pexels.com/photos/3769021/pexels-photo-3769021.jpeg?auto=compress&cs=tinysrgb&w=400" 
                         alt="Collins Otieno" 
                         class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Collins Otieno</h3>
                    <p class="text-green-600 font-medium mb-3">Lead Developer & Editor-in-Chief</p>
                    <p class="text-gray-600 text-sm">
                        Passionate about technology and journalism, Collins leads our editorial team and oversees the technical development of our platform.
                    </p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=400" 
                         alt="Justin Ludeki" 
                         class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Justin Ludeki</h3>
                    <p class="text-green-600 font-medium mb-3">Political Correspondent</p>
                    <p class="text-gray-600 text-sm">
                        Our lead political correspondent, Justin brings deep insights into Kenyan politics and governance to our readers.
                    </p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <img src="https://images.pexels.com/photos/3785077/pexels-photo-3785077.jpeg?auto=compress&cs=tinysrgb&w=400" 
                         alt="News254 Team" 
                         class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Our Editorial Team</h3>
                    <p class="text-green-600 font-medium mb-3">Content Creators</p>
                    <p class="text-gray-600 text-sm">
                        A dedicated team of journalists, editors, and content creators working around the clock to bring you the latest news.
                    </p>
                </div>
            </div>
        </div>

        <!-- Values -->
        <div class="bg-gray-50 rounded-lg p-8 mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Accuracy</h3>
                    <p class="text-gray-600 text-sm">We verify our facts and sources to ensure every story we publish is accurate and reliable.</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Timeliness</h3>
                    <p class="text-gray-600 text-sm">We deliver breaking news and updates as they happen, keeping you informed in real-time.</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Community</h3>
                    <p class="text-gray-600 text-sm">We serve the Kenyan community by focusing on stories that matter to our readers' daily lives.</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Innovation</h3>
                    <p class="text-gray-600 text-sm">We embrace technology and innovation to deliver news in the most accessible and engaging ways.</p>
                </div>
            </div>
        </div>

        <!-- Contact CTA -->
        <div class="bg-green-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Get in Touch</h2>
            <p class="mb-6">Have a story tip, feedback, or want to join our team? We'd love to hear from you.</p>
            <a href="{{ route('contact') }}" 
               class="bg-white text-green-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                Contact Us
            </a>
        </div>
    </div>
</div>
@endsection