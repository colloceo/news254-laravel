@extends('layouts.app')

@section('title', 'Careers - News254')
@section('description', 'Join the News254 team! Explore career opportunities at Kenya\'s premier news platform.')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Join Our Team</h1>
            <p class="text-xl text-gray-600">Help us shape the future of journalism in Kenya</p>
        </div>

        <!-- Why Work With Us -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Why Work at News254?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Innovation</h3>
                    <p class="text-gray-600">Work with cutting-edge technology and modern journalism practices.</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Impact</h3>
                    <p class="text-gray-600">Make a real difference by informing and empowering Kenyan communities.</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Growth</h3>
                    <p class="text-gray-600">Develop your skills with mentorship and continuous learning opportunities.</p>
                </div>
            </div>
        </div>

        <!-- Current Openings -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Current Openings</h2>
            <div class="space-y-6">
                <!-- Job 1 -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Senior Journalist - Politics</h3>
                            <p class="text-gray-600 mb-3">
                                We're looking for an experienced political journalist to cover Kenya's political landscape with depth and accuracy.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Full-time</span>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Nairobi</span>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">3+ years experience</span>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Bachelor's degree in Journalism, Communications, or related field</li>
                                <li>• 3+ years of political reporting experience</li>
                                <li>• Strong network of political contacts</li>
                                <li>• Excellent writing and research skills</li>
                            </ul>
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-6">
                            <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job 2 -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Frontend Developer</h3>
                            <p class="text-gray-600 mb-3">
                                Join our tech team to build and maintain our digital platform using modern web technologies.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Full-time</span>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Remote/Nairobi</span>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">2+ years experience</span>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Proficiency in React, TypeScript, and Tailwind CSS</li>
                                <li>• Experience with Laravel or similar backend frameworks</li>
                                <li>• Understanding of responsive design and web performance</li>
                                <li>• Portfolio of web development projects</li>
                            </ul>
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-6">
                            <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job 3 -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Content Editor</h3>
                            <p class="text-gray-600 mb-3">
                                Help maintain our editorial standards by reviewing, editing, and improving content quality.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Full-time</span>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Nairobi</span>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">2+ years experience</span>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Bachelor's degree in English, Journalism, or Communications</li>
                                <li>• Excellent command of English and Swahili</li>
                                <li>• Experience with content management systems</li>
                                <li>• Strong attention to detail and deadline management</li>
                            </ul>
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-6">
                            <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job 4 -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Social Media Manager</h3>
                            <p class="text-gray-600 mb-3">
                                Manage our social media presence and engage with our growing online community.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Full-time</span>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Nairobi</span>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">1+ years experience</span>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Experience managing social media accounts for brands</li>
                                <li>• Knowledge of social media analytics and tools</li>
                                <li>• Creative content creation skills</li>
                                <li>• Understanding of Kenyan social media landscape</li>
                            </ul>
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-6">
                            <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits -->
        <div class="bg-gray-50 rounded-lg p-8 mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Benefits & Perks</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Competitive Salary</h3>
                    <p class="text-sm text-gray-600">Market-competitive compensation packages</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Health Insurance</h3>
                    <p class="text-sm text-gray-600">Comprehensive medical coverage for you and family</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Learning Budget</h3>
                    <p class="text-sm text-gray-600">Annual budget for courses, conferences, and books</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Flexible Hours</h3>
                    <p class="text-sm text-gray-600">Work-life balance with flexible scheduling</p>
                </div>
            </div>
        </div>

        <!-- Application Process -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Application Process</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="bg-green-100 text-green-600 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3 font-bold">
                        1
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Apply</h3>
                    <p class="text-sm text-gray-600">Submit your application with CV and cover letter</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-100 text-green-600 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3 font-bold">
                        2
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Review</h3>
                    <p class="text-sm text-gray-600">Our team reviews your application (1-2 weeks)</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-100 text-green-600 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3 font-bold">
                        3
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Interview</h3>
                    <p class="text-sm text-gray-600">Phone/video interview with hiring manager</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-100 text-green-600 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3 font-bold">
                        4
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Decision</h3>
                    <p class="text-sm text-gray-600">Final decision and offer (within 1 week)</p>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Don't See a Perfect Fit?</h2>
            <p class="text-gray-600 mb-6">
                We're always looking for talented individuals. Send us your CV and tell us how you'd like to contribute to News254.
            </p>
            <a href="{{ route('contact') }}" 
               class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition-colors font-medium">
                Get in Touch
            </a>
        </div>
    </div>
</div>
@endsection