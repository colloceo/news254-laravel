@extends('layouts.admin')

@section('title', 'View Message')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Message Details</h1>
            <p class="text-gray-600 dark:text-gray-400">Contact form submission</p>
        </div>
        <a href="{{ route('admin.messages.index') }}" 
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
            Back to Messages
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                <p class="text-gray-900 dark:text-white">{{ $message->name }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <p class="text-gray-900 dark:text-white">
                    <a href="mailto:{{ $message->email }}" class="text-blue-600 hover:text-blue-800">{{ $message->email }}</a>
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                <p class="text-gray-900 dark:text-white">{{ ucfirst(str_replace('-', ' ', $message->subject)) }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date Received</label>
                <p class="text-gray-900 dark:text-white">{{ $message->created_at->format('F j, Y \a\t g:i A') }}</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                <p class="text-gray-900 dark:text-white whitespace-pre-wrap">{{ $message->message }}</p>
            </div>
        </div>

        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                @if($message->is_read)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Read
                    </span>
                @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        Unread
                    </span>
                @endif
            </div>
            
            <div class="flex space-x-2">
                <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Reply
                </a>
                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Are you sure you want to delete this message?')"
                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection