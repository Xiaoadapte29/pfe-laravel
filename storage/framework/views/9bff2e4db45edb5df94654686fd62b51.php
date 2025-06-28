

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
        <h2 class="text-xl font-semibold mb-4">Confirm Refusal</h2>
        <p class="mb-6">
            Are you sure you want to refuse this booking from <?php echo e($clientName); ?>? This action cannot be undone.
        </p>
        
        <div class="flex justify-end space-x-4">
            <a href="<?php echo e(route('professionals.dashboard')); ?>" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                Cancel
            </a>

            <form action="<?php echo e(route('bookings.acceptRefuse', ['booking' => $booking->id, 'action' => 'confirm-refuse'])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                    Refuse Booking
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/bookings/confirm-refusal.blade.php ENDPATH**/ ?>