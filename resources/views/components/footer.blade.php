<footer class="bg-gray-900 text-white mt-12">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <img src="https://iili.io/FULcRiF.png" alt="News254 Logo" class="w-6 h-6">
                    <h3 class="text-xl font-bold text-green-400">News254</h3>
                </div>
                <p class="text-gray-300 mb-4">Kenya's premier news platform delivering timely, relevant news.</p>
                <div class="flex space-x-4">
                    @if($globalContactInfo->facebook_url && $globalContactInfo->facebook_url !== '#')
                    <a href="{{ $globalContactInfo->facebook_url }}" target="_blank" class="text-gray-300 hover:text-white">Facebook</a>
                    @endif
                    @if($globalContactInfo->twitter_url && $globalContactInfo->twitter_url !== '#')
                    <a href="{{ $globalContactInfo->twitter_url }}" target="_blank" class="text-gray-300 hover:text-white">X</a>
                    @endif
                    @if($globalContactInfo->whatsapp_url && $globalContactInfo->whatsapp_url !== '#')
                    <a href="{{ $globalContactInfo->whatsapp_url }}" target="_blank" class="text-gray-300 hover:text-white">WhatsApp</a>
                    @endif
                </div>
            </div>
            
            <div>
                <h4 class="font-semibold mb-4">Company</h4>
                <ul class="space-y-2 text-gray-300 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-white">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:text-white">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-white">Terms</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-semibold mb-4">Contact Info</h4>
                <div class="text-gray-300 space-y-2 text-sm">
                    <p>Email: {{ $globalContactInfo->email }}</p>
                    <p>Phone: {{ $globalContactInfo->phone }}</p>
                    <p>Address: {{ $globalContactInfo->address }}</p>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300">
            <p class="text-sm">&copy; {{ date('Y') }} News254. All rights reserved.</p>
        </div>
    </div>
</footer>