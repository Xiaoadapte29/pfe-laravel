

<?php $__env->startSection('content'); ?>
    <!-- Section Héro -->
    <section class="min-h-screen flex items-center bg-gradient-to-br from-slate-50 via-white to-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                    À propos de FixHome
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-tight">
                    Nous construisons le
                    <span class="text-blue-600 block">futur des services</span>
                    à domicile
                </h1>
                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    Nous connectons les propriétaires aux professionnels de confiance grâce à une technologie innovante et des expériences fluides.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo e(route('services.index')); ?>" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md text-lg transition-colors">
                        Commencer
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                    <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 hover:bg-gray-50 font-medium rounded-md text-lg transition-colors">
                        Nous contacter
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Nos valeurs -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Ce qui nous motive
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Nos valeurs fondamentales guident notre mission de transformation des services à domicile.
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php $__currentLoopData = [
                    [
                        'icon' => 'target',
                        'title' => "Motivés par notre mission",
                        'description' => "Chaque décision est prise dans le but d'améliorer la vie grâce à de meilleurs services à domicile."
                    ],
                    [
                        'icon' => 'zap',
                        'title' => "Innovation avant tout",
                        'description' => "Nous repoussons constamment les limites pour créer des solutions nouvelles."
                    ],
                    [
                        'icon' => 'shield',
                        'title' => "Confiance & sécurité",
                        'description' => "Nous créons des relations durables basées sur la transparence et la fiabilité."
                    ],
                    [
                        'icon' => 'users',
                        'title' => "Axé sur la communauté",
                        'description' => "Nous croyons en l'autonomisation des propriétaires et des professionnels."
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

    <!-- Histoire -->
    <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-5 gap-16 items-center">
                <div class="lg:col-span-2">
                    <div class="sticky top-8">
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8 leading-tight">
                            Tout a commencé avec une idée simple
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">
                            Trouver un professionnel fiable ne devrait pas être un pari. 
                            FixHome est né pour mettre la qualité et la transparence au premier plan.
                        </p>
                        <a href="<?php echo e(route('professionals.index')); ?>" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md text-lg transition-colors">
                            Découvrir nos professionnels
                        </a>
                    </div>
                </div>
                <div class="lg:col-span-3 space-y-8">
                    <?php $__currentLoopData = [
                        [
                            'year' => "2020",
                            'title' => "Le Problème",
                            'description' => "Beaucoup de foyers avaient du mal à trouver des prestataires fiables. Les professionnels, eux, manquaient de visibilité."
                        ],
                        [
                            'year' => "2021",
                            'title' => "Des solutions concrètes",
                            'description' => "Nous avons créé un processus de vérification et un système d'avis pour garantir la qualité."
                        ],
                        [
                            'year' => "2022",
                            'title' => "Une communauté en croissance",
                            'description' => "Plus de 10 000 professionnels vérifiés et 25 000 clients satisfaits."
                        ],
                        [
                            'year' => "2024",
                            'title' => "Vers l'avenir",
                            'description' => "Nous étendons FixHome au niveau national avec des outils intelligents et accessibles."
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

    <!-- Impact -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Un impact réel sur le terrain
                </h2>
                <p class="text-xl text-gray-600">
                    Des chiffres qui prouvent notre réussite dans les services à domicile
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <?php $__currentLoopData = [
                    ['number' => "50 000+", 'label' => "Projets réalisés", 'sublabel' => "Améliorations à domicile avec succès"],
                    ['number' => "2 500+", 'label' => "Professionnels vérifiés", 'sublabel' => "Experts sélectionnés et de confiance"],
                    ['number' => "98%", 'label' => "Satisfaction client", 'sublabel' => "Basée sur les avis vérifiés"]
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-blue-600 mb-2"><?php echo e($stat['number']); ?></div>
                        <div class="text-xl font-semibold text-gray-900 mb-1"><?php echo e($stat['label']); ?></div>
                        <div class="text-gray-600"><?php echo e($stat['sublabel']); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl p-8 md:p-12 text-center text-white">
                <h3 class="text-2xl md:text-3xl font-bold mb-4">Prêt(e) à essayer FixHome ?</h3>
                <p class="text-lg md:text-xl mb-8 text-blue-100">
                    Rejoignez des milliers de familles marocaines qui nous font confiance
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="" class="inline-flex items-center justify-center px-6 py-3 bg-white text-blue-600 hover:bg-gray-100 font-medium rounded-md text-lg transition-colors">
                        Trouver un professionnel
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                    <a href="" class="inline-flex items-center justify-center px-6 py-3 border border-white text-white hover:bg-white/10 font-medium rounded-md text-lg transition-colors">
                        Devenir professionnel
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/about/index.blade.php ENDPATH**/ ?>