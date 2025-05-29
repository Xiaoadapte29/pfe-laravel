@extends('layouts.app')
@section('content')

  <section class="bg-gradient-to-r from-blue-50 to-indigo-50 py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6 max-w-xl">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        Find the Perfect <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Professional</span> for Your Home Services
                    </h1>
                    <p class="text-lg text-gray-600">
                        Connect with trusted experts for plumbing, electrical work, cleaning, and more. 
                        Quality service, guaranteed satisfaction, all at your fingertips.
                    </p>
                                        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                            <span>Book Now</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-lg transition-colors">
                            Become a Professional
                        </a>
                    </div>
                    
                    <div class="relative mt-6">
                        <div class="bg-white rounded-lg shadow-lg p-4">
                            <p class="text-sm font-medium mb-3">Quick Service Search</p>
                            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-2">
                                <div class="relative flex-grow">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        placeholder="What service do you need?" 
                                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>
                                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="hidden lg:block relative">
                    <img 
                        src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" 
                        alt="Professional home service" 
                        class="rounded-lg shadow-lg animate-float-slow"
                    />
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-lg shadow-lg">
                        <div class="flex items-center space-x-2">
                            <div class="bg-green-500 rounded-full w-3 h-3"></div>
                            <p class="font-medium text-sm">500+ Active Professionals</p>
                        </div>
                    </div>
                    <div class="absolute -top-6 -right-6 bg-white p-4 rounded-lg shadow-lg">
                        <div class="flex items-center space-x-2">
                            <div class="bg-blue-500 rounded-full w-3 h-3"></div>
                            <p class="font-medium text-sm">1000+ Completed Jobs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.service-categories')
    @include('components.how-it-works')
    @include('components.featured-professionals')
    @include('components.testimonials')
@endsection
