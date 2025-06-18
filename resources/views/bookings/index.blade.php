@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">Client Dashboard</h1>
                    <p class="text-gray-600">Manage your bookings with {{ $service->professional }}</p>
                </div>
                <a href="{{ route('services.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-gray-700 hover:bg-gray-50">
                    ← Back to Services
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow sticky top-6">
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <img 
                                    src="{{ $service->professional_image }}"
                                    alt="{{ $service->professional }}"
                                    class="w-12 h-12 rounded-full object-cover"
                                />
                                <div>
                                    <h3 class="text-xl font-bold">{{ $service->professional }}</h3>
                                    <p class="text-gray-600">{{ $service->name }}</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 gap-3 mb-6">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center text-gray-600">
                                        <svg class="h-4 w-4 fill-yellow-400 text-yellow-400 mr-2" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                        <span>Rating</span>
                                    </div>
                                    <span class="font-semibold">{{ $service->rating }}</span>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center text-gray-600">
                                        <svg class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>Duration</span>
                                    </div>
                                    <span class="font-semibold">{{ $service->duration }} mins</span>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center text-gray-600">
                                        <svg class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span>Location</span>
                                    </div>
                                    <span class="font-semibold">{{ $service->city }}</span>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-blue-600 text-white rounded-lg">
                                    <span class="font-semibold">Price</span>
                                    <span class="text-xl font-bold">${{ $service->price }}</span>
                                </div>
                            </div>
                            
                            <a href="{{ route('bookings.create', ['service_id' => $service->id]) }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md flex items-center justify-center">
                                + New Booking
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">Booking History</h2>
                            
                            @if($bookings->isEmpty())
                                <div class="text-center py-8">
                                    <p class="text-gray-500 mb-4">No bookings yet.</p>
                                    <a href="{{ route('bookings.create', ['service_id' => $service->id]) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                                        Create Your First Booking
                                    </a>
                                </div>
                            @else
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($bookings as $booking)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div>
                                                            <div class="font-medium">{{ $booking->date->format('l, F j, Y') }}</div>
                                                            <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($booking->time)->format('g:i A') }}</div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div>
                                                            <div class="font-medium">{{ $booking->name }}</div>
                                                            <div class="text-sm text-gray-500">{{ $booking->email }}</div>
                                                            <div class="text-sm text-gray-500">{{ $booking->phone }}</div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @php
                                                            $statusClasses = [
                                                                'confirmed' => 'bg-blue-100 text-blue-800',
                                                                'cancelled' => 'bg-red-100 text-red-800',
                                                                'completed' => 'bg-green-100 text-green-800'
                                                            ];
                                                        @endphp
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$booking->status] }}">
                                                            {{ $booking->status }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <div class="flex gap-2">
                                                            <a href="{{ route('bookings.edit', $booking->id) }}" class="text-blue-600 hover:text-blue-900">
                                                                Edit
                                                            </a>
                                                            
                                                            @if($booking->status === 'confirmed')
                                                                <form method="POST" action="{{ route('bookings.cancel', $booking->id) }}" class="inline">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit" class="text-yellow-600 hover:text-yellow-900">
                                                                        Cancel
                                                                    </button>
                                                                </form>
                                                            @endif
                                                            
                                                            <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}" class="inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection