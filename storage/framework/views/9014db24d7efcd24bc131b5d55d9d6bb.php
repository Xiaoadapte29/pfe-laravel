<header class="bg-white shadow-sm sticky top-0 z-50"> 
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="<?php echo e(url('/')); ?>" class="flex items-center space-x-2">
            <span class="text-2xl font-bold text-fixhome-primary">Fix<span class="text-fixhome-secondary">Home</span></span>
        </a>

        <nav class="hidden md:flex items-center space-x-8">
            <a href="<?php echo e(route('services.index')); ?>" class="text-gray-700 hover:text-fixhome-primary transition-colors">Services</a>
            <a href="<?php echo e(url('/professionals')); ?>" class="text-gray-700 hover:text-fixhome-primary transition-colors">Professionnels</a>
            <a href="<?php echo e(url('/about')); ?>" class="text-gray-700 hover:text-fixhome-primary transition-colors">À propos</a>
            <a href="<?php echo e(url('/contact')); ?>" class="text-gray-700 hover:text-fixhome-primary transition-colors">Contact</a>
        </nav>

        <div class="hidden md:flex items-center space-x-4">
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-outline text-sm flex items-center space-x-1">
                    <i class="lucide lucide-log-in w-4 h-4"></i><span>Connexion</span>
                </a>
                <a href="<?php echo e(route('register')); ?>" class="btn text-sm flex items-center space-x-1">
                    <i class="lucide lucide-user-circle w-4 h-4"></i><span>Inscription</span>
                </a>
            <?php else: ?>
                <span class="text-gray-700 mr-4">Bonjour, <?php echo e(auth()->user()->name); ?></span>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-outline text-sm flex items-center space-x-1 hover:text-red-600">
                        <i class="lucide lucide-log-out w-4 h-4"></i><span>Déconnexion</span>
                    </button>
                </form>
            <?php endif; ?>
        </div>

        
        <button id="mobile-menu-toggle" class="md:hidden text-gray-700">
            <i class="lucide lucide-menu w-6 h-6"></i>
        </button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t py-4 px-4">
        <nav class="flex flex-col space-y-4">
            <a href="<?php echo e(route('services.index')); ?>" class="text-gray-700 hover:text-fixhome-primary px-4 py-2 hover:bg-gray-50 rounded-md">Services</a>
            <a href="<?php echo e(url('/professionals')); ?>" class="text-gray-700 hover:text-fixhome-primary px-4 py-2 hover:bg-gray-50 rounded-md">Professionnels</a>
            <a href="<?php echo e(url('/about')); ?>" class="text-gray-700 hover:text-fixhome-primary px-4 py-2 hover:bg-gray-50 rounded-md">À propos</a>
            <a href="<?php echo e(url('/contact')); ?>" class="text-gray-700 hover:text-fixhome-primary px-4 py-2 hover:bg-gray-50 rounded-md">Contact</a>

            <div class="flex flex-col space-y-2 pt-4 border-t">
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-outline flex justify-center items-center">
                        <i class="lucide lucide-log-in w-4 h-4 mr-2"></i>Connexion
                    </a>
                    <a href="<?php echo e(route('register')); ?>" class="btn flex justify-center items-center">
                        <i class="lucide lucide-user-circle w-4 h-4 mr-2"></i>Inscription
                    </a>
                <?php else: ?>
                    <span class="px-4 py-2 text-gray-700">Bonjour, <?php echo e(auth()->user()->name); ?></span>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="px-4">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-outline w-full flex justify-center items-center hover:text-red-600">
                            <i class="lucide lucide-log-out w-4 h-4 mr-2"></i>Déconnexion
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>

<script>
  document.getElementById('mobile-menu-toggle').addEventListener('click', function () {
      document.getElementById('mobile-menu').classList.toggle('hidden');
  });
</script>
<?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/components/header.blade.php ENDPATH**/ ?>