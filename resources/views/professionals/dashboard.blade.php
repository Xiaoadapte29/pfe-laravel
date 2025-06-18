@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen" x-data="{ activeTab: 'overview' }">

    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                        {{ strtoupper(substr($professionalData['name'], 0, 1)) }}
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Welcome back, {{ $professionalData['name'] }}!</h1>
                        <div class="flex items-center space-x-4 mt-1">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $professionalData['status'] === 'verified' ? 'Verified Professional' : 'Pending Verification' }}
                            </span>
                            <span class="text-sm text-gray-600 flex items-center">
                                ⭐ {{ $professionalData['rating'] }} rating
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <button class="text-sm font-medium text-gray-700 border border-gray-300 rounded-md px-3 py-2 hover:bg-gray-100">View Public Profile</button>
                    <button class="text-sm font-medium text-white bg-blue-600 px-3 py-2 rounded-md hover:bg-blue-700">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <div class="border-b">
        <nav class="flex space-x-8 container mx-auto px-4">
            <button @click="activeTab = 'overview'" 
                    :class="activeTab === 'overview' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600 hover:text-blue-600'" 
                    class="py-3 text-sm font-medium">
                Overview
            </button>
            <button @click="activeTab = 'bookings'" 
                    :class="activeTab === 'bookings' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600 hover:text-blue-600'" 
                    class="py-3 text-sm font-medium">
                Bookings
            </button>
            <button @click="activeTab = 'reviews'" 
                    :class="activeTab === 'reviews' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600 hover:text-blue-600'" 
                    class="py-3 text-sm font-medium">
                Reviews
            </button>
            <button @click="activeTab = 'settings'" 
                    :class="activeTab === 'settings' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600 hover:text-blue-600'" 
                    class="py-3 text-sm font-medium">
                Settings
            </button>
        </nav>
    </div>

    <div class="container mx-auto px-4 py-8">
        <!-- Overview Tab Content -->
        <div x-show="activeTab === 'overview'" x-cloak>
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm text-gray-600">Total Jobs</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $professionalData['totalJobs'] }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm text-gray-600">Profile Views</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $professionalData['profileViews'] }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm text-gray-600">Total Earnings</p>
                    <p class="text-3xl font-bold text-gray-900">${{ number_format($professionalData['earnings']) }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm text-gray-600">Rating</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $professionalData['rating'] }}</p>
                </div>
            </div>

            <!-- Recent Bookings and Profile Completion -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Recent Bookings -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b">
                        <h3 class="text-lg font-medium text-gray-900">Recent Bookings</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        @foreach($bookings as $booking)
                            <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">{{ $booking['client'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $booking['service'] }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-900">${{ $booking['price'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $booking['date'] }}</p>
                                </div>
                            </div>
                        @endforeach
                        <button @click="activeTab = 'bookings'" class="block text-center text-blue-600 hover:underline text-sm mt-4">
                            View All Bookings
                        </button>
                    </div>
                </div>

                <!-- Profile Completion -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b">
                        <h3 class="text-lg font-medium text-gray-900">Profile Completion</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <div class="flex justify-between mb-1 text-sm font-medium">
                                <span>Progress</span>
                                <span>{{ $professionalData['profileCompletion'] }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $professionalData['profileCompletion'] }}%"></div>
                            </div>
                        </div>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li>
                                <span class="text-green-600 font-bold">✓</span> Basic information completed
                            </li>
                            <li>
                                <span class="text-green-600 font-bold">✓</span> Profile photo uploaded
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">✗</span> Add portfolio images
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bookings Tab Content -->
        <div x-show="activeTab === 'bookings'" x-cloak>
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900">My Bookings</h3>
                    <div class="flex space-x-2">
                        <button class="text-sm font-medium text-gray-700 border border-gray-300 rounded-md px-3 py-1 hover:bg-gray-100">Filter</button>
                        <button class="text-sm font-medium text-white bg-blue-600 px-3 py-1 rounded-md hover:bg-blue-700">Export</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($bookings as $booking)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $booking['client'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $booking['service'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $booking['date'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($booking['status'] === 'confirmed')
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                                    @elseif($booking['status'] === 'pending')
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                    @elseif($booking['status'] === 'completed')
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Completed</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">${{ $booking['price'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900">View Details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t">
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">{{ count($bookings) }}</span> of <span class="font-medium">{{ count($bookings) }}</span> results
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 border rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Previous</button>
                            <button class="px-3 py-1 border rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Tab Content -->
        <div x-show="activeTab === 'reviews'" x-cloak>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Customer Reviews</h2>
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                                <div>
                                    <p class="font-medium">Sarah Johnson</p>
                                    <div class="flex items-center">
                                        ⭐⭐⭐⭐⭐
                                        <span class="text-gray-500 text-sm ml-2">2 days ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2 text-gray-700">John did an amazing job fixing my kitchen sink. Very professional and punctual!</p>
                    </div>
                    <div class="border-b pb-4">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                                <div>
                                    <p class="font-medium">Mike Wilson</p>
                                    <div class="flex items-center">
                                        ⭐⭐⭐⭐
                                        <span class="text-gray-500 text-sm ml-2">1 week ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2 text-gray-700">Great work on the bathroom plumbing. Would hire again!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Tab Content -->
        <div x-show="activeTab === 'settings'" x-cloak>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-6">Account Settings</h2>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-medium mb-3">Profile Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" value="{{ explode(' ', $professionalData['name'])[0] }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" value="{{ explode(' ', $professionalData['name'])[1] ?? '' }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" value="john.smith@example.com" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="tel" value="+1 (555) 123-4567" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-medium mb-3">Service Preferences</h3>
                        <div class="space-y-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" checked class="rounded text-blue-600 focus:ring-blue-500">
                                <span class="ml-2">Receive booking notifications</span>
                            </label>
                            <br>
                            <label class="inline-flex items-center">
                                <input type="checkbox" checked class="rounded text-blue-600 focus:ring-blue-500">
                                <span class="ml-2">Receive review notifications</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-t">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection