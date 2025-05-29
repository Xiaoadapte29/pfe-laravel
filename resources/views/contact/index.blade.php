@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl md:text-4xl font-bold mb-8 text-center">Contact Us</h1>
        
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <div>
                <h2 class="text-2xl font-semibold mb-6">Get In Touch</h2>
                <p class="text-gray-600 mb-8">
                    Have questions about our services or need assistance? Fill out the form below or reach out to us directly using our contact information.
                </p>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 lucide lucide-map-pin"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <h3 class="font-medium">Our Location</h3>
                            <p class="text-gray-600">123 Street Name, City, Country</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-medium">Phone Number</h3>
                            <p class="text-gray-600">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </div>
                        <div>
                            <h3 class="font-medium">Email Address</h3>
                            <p class="text-gray-600">contact@fixhome.com</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 lucide lucide-clock"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div>
                            <h3 class="font-medium">Working Hours</h3>
                            <p class="text-gray-600">Mon - Fri: 9AM - 6PM</p>
                            <p class="text-gray-600">Sat: 10AM - 4PM</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                        <input 
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                            placeholder="John Doe"
                            required
                        />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input 
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                            placeholder="john@example.com"
                            required
                        />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                        <input 
                            type="text"
                            id="subject"
                            name="subject"
                            value="{{ old('subject') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('subject') border-red-500 @enderror"
                            placeholder="Inquiry about services"
                            required
                        />
                        @error('subject')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea 
                            id="message"
                            name="message"
                            rows="5"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('message') border-red-500 @enderror"
                            placeholder="Your message here..."
                            required
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition-colors">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
        
        <div class="rounded-lg overflow-hidden h-96">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.30593401584!2d-74.25987368715491!3d40.69714941774136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1624978549706!5m2!1sen!2s" 
                width="100%" 
                height="100%" 
                style="border: 0;" 
                allowfullscreen 
                loading="lazy">
            </iframe>
        </div>
    </div>
@endsection

@push('scripts')
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                alert('{{ session('success') }}');
            });
        </script>
    @endif
@endpush