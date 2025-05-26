<?php $__env->startSection('content'); ?>
<div class="bg-white">
    <!-- Hero Section -->
    <section class="relative bg-gray-50">
        <div class="container mx-auto px-4 py-20 md:py-32">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    About <span class="text-blue-600">FixHome</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    Connecting homeowners with trusted local professionals since 2023
                </p>
                <div class="flex justify-center gap-4">
                    <a href="<?php echo e(route('register')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition duration-300">
                        Get Started
                    </a>
                    <a href="<?php echo e(route('professionals.index')); ?>" class="border border-blue-600 text-blue-600 hover:bg-blue-50 px-8 py-3 rounded-lg font-medium transition duration-300">
                        Find Professionals
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf" alt="Team working" class="rounded-lg shadow-md w-full h-auto">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Story</h2>
                    <p class="text-gray-600 mb-4">
                        FixHome was founded by homeowners who were frustrated with the difficulty of finding reliable, skilled professionals for home repairs and improvements. What started as a local solution in New York has grown into a nationwide platform connecting thousands of homeowners with vetted professionals.
                    </p>
                    <p class="text-gray-600">
                        We believe every homeowner deserves peace of mind when hiring help for their home. That's why we carefully screen every professional on our platform and stand behind their work with our satisfaction guarantee.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Values</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    The principles that guide everything we do
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Trust & Safety</h3>
                    <p class="text-gray-600">
                        Every professional is background-checked, licensed, and reviewed before joining our platform.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Quality Service</h3>
                    <p class="text-gray-600">
                        We maintain high standards and only work with professionals who deliver exceptional results.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Fair Pricing</h3>
                    <p class="text-gray-600">
                        Transparent, upfront pricing with no hidden fees or surprises.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Meet Our Team</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    The people behind FixHome
                </p>
            </div>
            
            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Team member" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-white shadow-md">
                    <h3 class="text-xl font-bold text-gray-900">John Smith</h3>
                    <p class="text-blue-600">Founder & CEO</p>
                </div>
                <div class="text-center">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Team member" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-white shadow-md">
                    <h3 class="text-xl font-bold text-gray-900">Sarah Johnson</h3>
                    <p class="text-blue-600">Head of Operations</p>
                </div>
                <div class="text-center">
                    <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Team member" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-white shadow-md">
                    <h3 class="text-xl font-bold text-gray-900">Michael Chen</h3>
                    <p class="text-blue-600">Technology Lead</p>
                </div>
                <div class="text-center">
                    <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Team member" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-white shadow-md">
                    <h3 class="text-xl font-bold text-gray-900">Emily Rodriguez</h3>
                    <p class="text-blue-600">Customer Success</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Real stories from happy homeowners
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center text-yellow-400 mr-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">
                        "The plumber FixHome connected me with was professional, on time, and fixed my leaky faucet in no time. I'll definitely use this service again!"
                    </p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Customer" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <div>
                            <h4 class="font-bold text-gray-900">Lisa Thompson</h4>
                            <p class="text-gray-500">Homeowner, New York</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to find your perfect professional?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Join thousands of satisfied homeowners who trust FixHome for their home service needs.
            </p>
            <a href="<?php echo e(route('register')); ?>" class="inline-block bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium transition duration-300">
                Get Started Today
            </a>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>