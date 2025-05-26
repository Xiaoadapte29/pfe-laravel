@extends('layouts.app')

@section('content')
<section class="bg-blue-600 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Find Trusted Home Service Professionals</h1>
            <p class="text-blue-100 mb-6">Connect with experienced professionals in your area</p>
            
            <form method="GET" action="{{ route('professionals.index') }}" class="relative">
                <input
                    type="text"
                    name="search"
                    placeholder="Search by name or specialty..."
                    class="pl-10 bg-white text-gray-800 w-full rounded-lg p-3"
                    value="{{ request('search') }}"
                >
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </form>
        </div>
    </div>
</section>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap gap-4 mb-8 overflow-x-auto pb-2">
            @foreach($specialties as $key => $specialty)
                <a href="{{ route('professionals.index', ['specialty' => $key] + request()->except('specialty')) }}"
                   class="{{ request('specialty', 'all') === $key ? 'bg-blue-600 text-white' : 'bg-white text-gray-700' }} px-4 py-2 rounded-full shadow-sm hover:shadow-md transition-shadow">
                    {{ $specialty }}
                </a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Filters -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <form method="GET" action="{{ route('professionals.index') }}">
                    <h3 class="font-medium text-lg mb-4">Filters</h3>
                    
                    <!-- Rating -->
                    <div class="mb-6">
                        <h4 class="font-medium mb-2">Rating</h4>
                        @foreach([4, 3, 2, 1] as $rating)
                            <div class="flex items-center mb-2">
                                <input type="radio" name="rating" 
                                       id="rating-{{ $rating }}" 
                                       value="{{ $rating }}"
                                       {{ request('rating') == $rating ? 'checked' : '' }}
                                       class="form-radio h-4 w-4 text-blue-600">
                                <label for="rating-{{ $rating }}" class="ml-2">
                                    {{ $rating }}+ 
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="inline w-4 h-4 {{ $i < $rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Location -->
                    <div class="mb-6">
                        <h4 class="font-medium mb-2">Location</h4>
                        @foreach($locations as $location)
                            <div class="flex items-center mb-2">
                                <input type="radio" name="location" 
                                       id="location-{{ $location }}" 
                                       value="{{ $location }}"
                                       {{ request('location') == $location ? 'checked' : '' }}
                                       class="form-radio h-4 w-4 text-blue-600">
                                <label for="location-{{ $location }}" class="ml-2">{{ $location }}</label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Availability -->
                    <div class="mb-6">
                        <h4 class="font-medium mb-2">Availability</h4>
                        @foreach($days as $day)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" name="availability[]" 
                                       id="day-{{ $day }}" 
                                       value="{{ $day }}"
                                       {{ in_array($day, (array)request('availability', [])) ? 'checked' : '' }}
                                       class="form-checkbox h-4 w-4 text-blue-600">
                                <label for="day-{{ $day }}" class="ml-2">{{ $day }}</label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                        Apply Filters
                    </button>
                    <a href="{{ route('professionals.index') }}" class="block text-center mt-2 text-blue-600 hover:underline">
                        Clear Filters
                    </a>
                </form>
            </div>

            <!-- Professionals List -->
            <div class="md:col-span-3">
                @forelse($filteredProfessionals as $professional)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow mb-6">
                        <div class="p-6">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <!-- Professional Image -->
                                <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                                    <img src="{{ $professional['image'] }}" 
                                         alt="{{ $professional['name'] }}" 
                                         class="w-24 h-24 rounded-full object-cover">
                                </div>
                                
                                <!-- Professional Info -->
                                <div class="flex-grow">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-xl font-bold">{{ $professional['name'] }}</h3>
                                            <p class="text-blue-600 font-medium">{{ $professional['specialty'] }}</p>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <span class="ml-1">{{ $professional['rating'] }}</span>
                                            <span class="text-gray-500 ml-1">({{ $professional['reviews'] }} reviews)</span>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-2">
                                        <div class="flex items-center text-gray-600 mb-1">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span>{{ $professional['city'] }}</span>
                                        </div>
                                        <div class="flex items-center text-gray-600 mb-1">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            <span>{{ $professional['experience'] }} experience</span>
                                        </div>
                                        <div class="flex items-center text-gray-600">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span>Available: {{ implode(', ', $professional['availability']) }}</span>
                                        </div>
                                    </div>
                                    
                                    <p class="mt-3 text-gray-600">{{ $professional['description'] }}</p>
                                    
                                    <div class="mt-4 flex space-x-3">
<a href="" 
   class="inline-block mt-4 text-blue-600 hover:underline font-medium">
    View Profile
</a>
                                       <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                            Book Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                        <p class="text-gray-500">No professionals found matching your criteria.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection