<section class="bg-blue-600 py-12 text-white text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-2">Client Testimonials</h2>
        <p class="mb-10">See what our satisfied clients have to say about our services</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white text-gray-900 rounded-xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/40?img=1" alt="Jennifer" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-bold">Jennifer K.</p>
                        <p class="text-sm text-gray-600">Plumbing Service</p>
                    </div>
                    <div class="ml-auto text-yellow-400">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                </div>
                <p>"The plumber was amazing! Fixed my kitchen sink in no time and explained what happened. Will definitely use FixHome again."</p>
            </div>

            <div class="bg-white text-gray-900 rounded-xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/40?img=2" alt="Michael" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-bold">Michael T.</p>
                        <p class="text-sm text-gray-600">Electrical Installation</p>
                    </div>
                    <div class="ml-auto text-yellow-400">
                        @for ($i = 0; $i < 4; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                </div>
                <p>"Very professional service. The electrician was punctual, knowledgeable, and fixed my outlet issues safely. Great experience!"</p>
            </div>

            <div class="bg-white text-gray-900 rounded-xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/40?img=3" alt="Sophia" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-bold">Sophia R.</p>
                        <p class="text-sm text-gray-600">Home Cleaning</p>
                    </div>
                    <div class="ml-auto text-yellow-400">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                </div>
                <p>"Exceptional cleaning service! My apartment hasn't been this clean in ages. The attention to detail was impressive. Highly recommend!"</p>
            </div>
        </div>

        <div class="mt-8 flex justify-center gap-4">
            <button class="w-10 h-10 rounded-full bg-blue-800 text-white hover:bg-blue-700">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="w-10 h-10 rounded-full bg-blue-800 text-white hover:bg-blue-700">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>
