

<?php $__env->startSection('content'); ?>
    <!-- Hero Section - Single Column -->
    <section class="min-h-screen flex items-center bg-gradient-to-br from-slate-50 via-white to-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                    About FixHome
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-tight">
                    We're building the
                    <span class="text-blue-600 block">future of home</span>
                    services
                </h1>
                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    Connecting homeowners with trusted professionals through innovative technology and seamless experiences.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo e(route('services.index')); ?>" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md text-lg transition-colors">
                        Get Started
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                    <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 hover:bg-gray-50 font-medium rounded-md text-lg transition-colors">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    What drives us forward
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Our core values shape everything we do and guide our mission to transform home services.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php $__currentLoopData = [
                    [
                        'icon' => 'target',
                        'title' => "Purpose-driven",
                        'description' => "Every decision we make is guided by our mission to improve lives through better home services."
                    ],
                    [
                        'icon' => 'zap',
                        'title' => "Innovation first",
                        'description' => "We constantly push boundaries to create solutions that didn't exist before."
                    ],
                    [
                        'icon' => 'shield',
                        'title' => "Trust & safety",
                        'description' => "Building lasting relationships through transparency, reliability, and accountability."
                    ],
                    [
                        'icon' => 'users',
                        'title' => "Community focused",
                        'description' => "We believe in empowering both homeowners and professionals to succeed together."
                    ]
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group hover:transform hover:scale-105 transition-all duration-300">
                        <div class="bg-gray-50 rounded-2xl p-8 h-full">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-700 transition-colors">
                                <?php if($value['icon'] === 'target'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                                <?php elseif($value['icon'] === 'zap'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                <?php elseif($value['icon'] === 'shield'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                                <?php elseif($value['icon'] === 'users'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                <?php endif; ?>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4"><?php echo e($value['title']); ?></h3>
                            <p class="text-gray-600"><?php echo e($value['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- Story Section with Asymmetric Layout -->
    <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-5 gap-16 items-center">
                <div class="lg:col-span-2">
                    <div class="sticky top-8">
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8 leading-tight">
                            Our story started with a simple idea
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">
                            Finding reliable home service professionals shouldn't be a gamble. 
                            That's why we created a platform that puts quality, trust, and transparency first.
                        </p>
                        <a href="<?php echo e(route('professionals.index')); ?>" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md text-lg transition-colors">
                            Meet Our Professionals
                        </a>
                    </div>
                </div>
                <div class="lg:col-span-3 space-y-8">
                    <?php $__currentLoopData = [
                        [
                            'year' => "2020",
                            'title' => "The Problem",
                            'description' => "We recognized that homeowners struggled to find trustworthy service providers, while skilled professionals had limited ways to showcase their expertise."
                        ],
                        [
                            'year' => "2021",
                            'title' => "Building Solutions",
                            'description' => "Our team developed a comprehensive vetting process and review system to ensure quality connections between homeowners and professionals."
                        ],
                        [
                            'year' => "2022",
                            'title' => "Growing Community",
                            'description' => "We reached 10,000+ verified professionals and 25,000+ satisfied customers, proving our model works for everyone."
                        ],
                        [
                            'year' => "2024",
                            'title' => "The Future",
                            'description' => "Today, we're expanding nationwide with AI-powered matching and innovative tools that make home services seamless for all."
                        ]
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex gap-6">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center">
                                    <span class="text-white font-bold text-sm"><?php echo e($milestone['year']); ?></span>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3"><?php echo e($milestone['title']); ?></h3>
                                <p class="text-gray-600 leading-relaxed"><?php echo e($milestone['description']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Making a real impact
                </h2>
                <p class="text-xl text-gray-600">
                    Numbers that show how we're transforming the home services industry
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <?php $__currentLoopData = [
                    ['number' => "50,000+", 'label' => "Projects completed", 'sublabel' => "Successful home improvements"],
                    ['number' => "2,500+", 'label' => "Verified professionals", 'sublabel' => "Background-checked experts"],
                    ['number' => "98%", 'label' => "Customer satisfaction", 'sublabel' => "Based on verified reviews"]
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-blue-600 mb-2"><?php echo e($stat['number']); ?></div>
                        <div class="text-xl font-semibold text-gray-900 mb-1"><?php echo e($stat['label']); ?></div>
                        <div class="text-gray-600"><?php echo e($stat['sublabel']); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl p-8 md:p-12 text-center text-white">
                <h3 class="text-2xl md:text-3xl font-bold mb-4">Ready to experience the difference?</h3>
                <p class="text-lg md:text-xl mb-8 text-blue-100">
                    Join thousands of homeowners who trust FixHome for their service needs
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="" class="inline-flex items-center justify-center px-6 py-3 bg-white text-blue-600 hover:bg-gray-100 font-medium rounded-md text-lg transition-colors">
                        Find Professionals
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                    <a href="" class="inline-flex items-center justify-center px-6 py-3 border border-white text-white hover:bg-white/10 font-medium rounded-md text-lg transition-colors">
                        Join as Professional
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/about/index.blade.php ENDPATH**/ ?>