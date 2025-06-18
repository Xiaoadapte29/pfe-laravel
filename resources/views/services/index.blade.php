@extends('layouts.app')
@section('content')
<section class="bg-blue-600 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Find the Perfect Service for Your Home</h1>
            <p class="text-blue-100 mb-6">Browse through our selection of professional home services</p>
            
<form method="GET" action="{{ route('services.index') }}" class="relative">                @csrf
                <input 
                    type="text" 
                    name="search"
                    placeholder="Search for a service..." 
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
            @foreach($categories as $category)
                <a 
                    href="{{ route('services.index', ['category' => $category['id']] + request()->except('category')) }}"
                    class="{{ request('category', 'all') === $category['id'] ? 'bg-blue-600 text-white' : 'bg-white text-gray-700' }} px-4 py-2 rounded-full shadow-sm hover:shadow-md transition-shadow"
                >
                    {{ $category['name'] }}
                </a>
            @endforeach
        </div>

        <div class="md:hidden flex justify-end mb-4">
            <button class="flex items-center bg-white px-4 py-2 rounded-lg shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                Filters
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <form method="GET" action="{{ route('services.index') }}">
                    <h3 class="font-medium text-lg mb-4">Filters</h3>
                    
                    <div class="mb-6">
                        <h4 class="font-medium mb-2">Price Range</h4>
                        <div class="flex gap-4">
                            <input type="number" name="min_price" placeholder="Min" 
                                   class="w-full p-2 border rounded" 
                                   value="{{ request('min_price') }}">
                            <input type="number" name="max_price" placeholder="Max" 
                                   class="w-full p-2 border rounded" 
                                   value="{{ request('max_price') }}">
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="font-medium mb-2">Rating</h4>
                        @foreach([4, 3, 2, 1] as $rating)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" name="ratings[]" 
                                       id="rating-{{ $rating }}" 
                                       value="{{ $rating }}"
                                       {{ in_array($rating, (array)request('ratings', [])) ? 'checked' : '' }}
                                       class="form-checkbox h-4 w-4 text-blue-600">
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

                    <div class="mb-6">
                        <h4 class="font-medium mb-2">Location</h4>
                        @foreach($cities as $city)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" name="cities[]" 
                                       id="city-{{ $city }}" 
                                       value="{{ $city }}"
                                       {{ in_array($city, (array)request('cities', [])) ? 'checked' : '' }}
                                       class="form-checkbox h-4 w-4 text-blue-600">
                                <label for="city-{{ $city }}" class="ml-2">{{ $city }}</label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                        Apply Filters
                    </button>
                </form>
            </div>

            <div class="md:col-span-3">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($filteredServices as $service)
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                            <div class="p-5">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-semibold text-lg mb-1">{{ $service['name'] }}</h3>
                                    @if($service['isPopular'])
                                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Popular</span>
                                    @endif
                                </div>

                                <div class="flex items-center mb-3 text-sm">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 {{ $i < floor($service['rating']) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                    <span class="ml-1">({{ $service['reviews'] }})</span>
                                </div>

                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="text-sm">{{ $service['duration'] }} mins</span>
                                    </div>
                                    <div class="font-medium text-lg text-blue-600">${{ $service['price'] }}</div>
                                </div>

                                <div class="border-t pt-4 mt-1">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <img src="{{ $service['professionalImage'] }}" 
                                                 alt="{{ $service['professional'] }}" 
                                                 class="w-8 h-8 rounded-full object-cover mr-2">
                                            <div class="text-sm">
                                                <p class="font-medium">{{ $service['professional'] }}</p>
                                                <div class="flex items-center text-gray-500">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                    <span class="text-xs">{{ $service['city'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('bookings.index', ['service_id' => $service['id']]) }}" 
   class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    Book
</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-500">No services found matching your criteria.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection