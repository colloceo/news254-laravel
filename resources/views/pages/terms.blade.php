@extends('layouts.app')

@section('title', 'Terms of Service - News254')
@section('description', 'Read News254\'s terms of service to understand the rules and regulations for using our website and services.')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Terms of Service</h1>
            <p class="text-gray-600">Last updated: {{ date('F j, Y') }}</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8 prose prose-lg max-w-none">
            <h2>Agreement to Terms</h2>
            <p>
                By accessing and using News254, you accept and agree to be bound by the terms and provision of this agreement.
            </p>

            <h2>Use License</h2>
            <p>
                Permission is granted to temporarily download one copy of the materials on News254's website for personal, non-commercial transitory viewing only.
            </p>
            <p>This is the grant of a license, not a transfer of title, and under this license you may not:</p>
            <ul>
                <li>modify or copy the materials</li>
                <li>use the materials for any commercial purpose or for any public display</li>
                <li>attempt to reverse engineer any software contained on the website</li>
                <li>remove any copyright or other proprietary notations from the materials</li>
            </ul>

            <h2>User Content</h2>
            <p>
                Our service may allow you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material ("Content").
            </p>
            <p>You are responsible for Content that you post to the service, including its legality, reliability, and appropriateness.</p>

            <h2>Prohibited Uses</h2>
            <p>You may not use our service:</p>
            <ul>
                <li>For any unlawful purpose or to solicit others to perform unlawful acts</li>
                <li>To violate any international, federal, provincial, or state regulations, rules, laws, or local ordinances</li>
                <li>To infringe upon or violate our intellectual property rights or the intellectual property rights of others</li>
                <li>To harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate</li>
                <li>To submit false or misleading information</li>
                <li>To upload or transmit viruses or any other type of malicious code</li>
            </ul>

            <h2>Content Accuracy</h2>
            <p>
                The materials appearing on News254's website could include technical, typographical, or photographic errors. News254 does not warrant that any of the materials on its website are accurate, complete, or current.
            </p>

            <h2>Links</h2>
            <p>
                News254 has not reviewed all of the sites linked to our website and is not responsible for the contents of any such linked site.
            </p>

            <h2>Modifications</h2>
            <p>
                News254 may revise these terms of service for its website at any time without notice. By using this website, you are agreeing to be bound by the then current version of these terms of service.
            </p>

            <h2>Governing Law</h2>
            <p>
                These terms and conditions are governed by and construed in accordance with the laws of Kenya and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.
            </p>

            <h2>Privacy Policy</h2>
            <p>
                Your privacy is important to us. Please review our Privacy Policy, which also governs your use of the service.
            </p>

            <h2>Termination</h2>
            <p>
                We may terminate or suspend your account and bar access to the service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever.
            </p>

            <h2>Disclaimer</h2>
            <p>
                The information on this website is provided on an "as is" basis. To the fullest extent permitted by law, this Company excludes all representations, warranties, conditions and terms.
            </p>

            <h2>Contact Information</h2>
            <p>If you have any questions about these Terms of Service, please contact us:</p>
            <ul>
                <li>Email: legal@news254.co.ke</li>
                <li>Phone: +254 700 000 000</li>
                <li>Address: Nairobi, Kenya</li>
            </ul>
        </div>
    </div>
</div>
@endsection