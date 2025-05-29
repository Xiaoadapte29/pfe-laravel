<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="<?php echo e(url('/')); ?>" class="flex items-center space-x-2">
            <span class="text-2xl font-bold text-fixhome-primary">Fix<span class="text-fixhome-secondary">Home</span></span>
        </a>

        <nav class="hidden md:flex items-center space-x-8">
            <a href="<?php echo e(route('services.index')); ?>" class="text-gray-700 hover:text-fixhome-primary transition-colors">Services</a>
            <a href="<?php echo e(url('/professionals')); ?>" class="text-gray-700 hover:text-fixhome-primary transition-colors">Professionals</a>
            <a href="<?php echo e(url('/about')); ?>" class="text-gray-700 hover:text-fixhome-primary transition-colors">About</a>
            <a href="<?php echo e(url('/contact')); ?>" class="text-gray-700 hover:text-fixhome-primary transition-colors">Contact</a>
        </nav>

        <div class="hidden md:flex items-center space-x-4">
            <a href="<?php echo e(route('login')); ?>" class="btn btn-outline text-sm flex items-center space-x-1">
                <i class="lucide lucide-log-in w-4 h-4"></i><span>Login</span>
            </a>
            <a href="<?php echo e(route('register')); ?>" class="btn text-sm flex items-center space-x-1">
                <i class="lucide lucide-user-circle w-4 h-4"></i><span>Register</span>
            </a>
        </div>

        
        <button id="mobile-menu-toggle" class="md:hidden text-gray-700">
            <i class="lucide lucide-menu w-6 h-6"></i>
        </button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t py-4 px-4">
        <nav class="flex flex-col space-y-4">
            <a href="<?php echo e(route('services.index')); ?>" class="text-gray-700 hover:text-fixhome-primary px-4 py-2 hover:bg-gray-50 rounded-md">Services</a>
            <a href="<?php echo e(url('/professionals')); ?>" class="text-gray-700 hover:text-fixhome-primary px-4 py-2 hover:bg-gray-50 rounded-md">Professionals</a>
            <a href="<?php echo e(url('/about')); ?>" class="text-gray-700 hover:text-fixhome-primary px-4 py-2 hover:bg-gray-50 rounded-md">About</a>
            <a href="<?php echo e(url('/contact')); ?>" class="text-gray-700 hover:text-fixhome-primary px-4 py-2 hover:bg-gray-50 rounded-md">Contact</a>
            <div class="flex flex-col space-y-2 pt-4 border-t">
                <a href="<?php echo e(route('login')); ?>" class="btn btn-outline flex justify-center items-center">
                    <i class="lucide lucide-log-in w-4 h-4 mr-2"></i>Login
                </a>
                <a href="<?php echo e(route('register')); ?>" class="btn flex justify-center items-center">
                    <i class="lucide lucide-user-circle w-4 h-4 mr-2"></i>Register
                </a>
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