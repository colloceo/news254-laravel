@extends('layouts.app')

@section('title', 'Privacy Policy - News254')
@section('description', 'News254 Privacy Policy - Learn how we collect, use, and protect your personal information.')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 lg:p-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Privacy Policy</h1>
            <p class="text-gray-600 dark:text-gray-400 mb-8">Last updated: {{ now()->format('F j, Y') }}</p>

            <div class="prose prose-lg dark:prose-invert max-w-none">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Introduction</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    News254 ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services.
                </p>

                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Information We Collect</h2>
                
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Personal Information</h3>
                <p class="text-gray-700 dark:text-gray-300 mb-4">We may collect personal information that you voluntarily provide to us when you:</p>
                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 mb-6">
                    <li>Subscribe to our newsletter</li>
                    <li>Comment on articles</li>
                    <li>Contact us through our contact form</li>
                    <li>Create an account on our website</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Automatically Collected Information</h3>
                <p class="text-gray-700 dark:text-gray-300 mb-4">When you visit our website, we may automatically collect certain information about your device, including:</p>
                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 mb-6">
                    <li>IP address</li>
                    <li>Browser type and version</li>
                    <li>Operating system</li>
                    <li>Pages visited and time spent on our site</li>
                    <li>Referring website</li>
                </ul>

                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">How We Use Your Information</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-4">We use the information we collect to:</p>
                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 mb-6">
                    <li>Provide, operate, and maintain our website</li>
                    <li>Improve, personalize, and expand our website</li>
                    <li>Understand and analyze how you use our website</li>
                    <li>Develop new products, services, features, and functionality</li>
                    <li>Communicate with you for customer service and support</li>
                    <li>Send you newsletters and marketing communications (with your consent)</li>
                    <li>Find and prevent fraud</li>
                </ul>

                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Cookies and Tracking Technologies</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    We use cookies and similar tracking technologies to track activity on our website and store certain information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent.
                </p>

                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Third-Party Services</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-4">We may use third-party services such as:</p>
                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 mb-6">
                    <li>Google Analytics for website analytics</li>
                    <li>Google AdSense for advertising</li>
                    <li>Social media platforms for content sharing</li>
                </ul>

                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Data Security</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.
                </p>

                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Your Rights</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-4">You have the right to:</p>
                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 mb-6">
                    <li>Access your personal information</li>
                    <li>Correct inaccurate information</li>
                    <li>Request deletion of your information</li>
                    <li>Object to processing of your information</li>
                    <li>Request data portability</li>
                </ul>

                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Children's Privacy</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    Our website is not intended for children under 13 years of age. We do not knowingly collect personal information from children under 13.
                </p>

                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Changes to This Privacy Policy</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date.
                </p>

                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Contact Us</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-4">If you have any questions about this Privacy Policy, please contact us:</p>
                <ul class="list-none text-gray-700 dark:text-gray-300 mb-6">
                    <li class="mb-2"><strong>Email:</strong> justintech81@gmail.com</li>
                    <li class="mb-2"><strong>Phone:</strong> +254 751 153 333</li>
                    <li class="mb-2"><strong>Address:</strong> Nairobi, Kenya</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection