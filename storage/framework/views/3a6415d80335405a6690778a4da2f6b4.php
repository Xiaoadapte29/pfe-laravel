

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow p-6">
                <h1 class="text-2xl font-bold mb-6">Edit Booking #<?php echo e($booking->id); ?></h1>
                
                <form method="POST" action="<?php echo e(route('bookings.update', $booking->id)); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" name="service_id" value="<?php echo e($booking->service_id); ?>">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="<?php echo e(old('name', $booking->name)); ?>"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            >
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="<?php echo e(old('email', $booking->email)); ?>"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                            <input
                                id="phone"
                                name="phone"
                                type="tel"
                                value="<?php echo e(old('phone', $booking->phone)); ?>"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            >
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Service Address</label>
                            <input
                                id="address"
                                name="address"
                                type="text"
                                value="<?php echo e(old('address', $booking->address)); ?>"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Preferred Date *</label>
                            <input
                                id="date"
                                name="date"
                                type="date"
                                value="<?php echo e(old('date', \Carbon\Carbon::parse($booking->scheduled_at)->format('Y-m-d'))); ?>"
                                required
                                min="<?php echo e(date('Y-m-d')); ?>"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            >
                        </div>

                        <div>
                            <label for="time" class="block text-sm font-medium text-gray-700 mb-1">Preferred Time *</label>
                            <input
                                id="time"
                                name="time"
                                type="time"
                                value="<?php echo e(old('time', \Carbon\Carbon::parse($booking->scheduled_at)->format('H:i'))); ?>"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Additional Notes</label>
                        <textarea
                            id="notes"
                            name="notes"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            rows="3"
                        ><?php echo e(old('notes', $booking->notes)); ?></textarea>
                    </div>

                    <div class="flex gap-3 pt-4">
                        <a href="<?php echo e(route('bookings.index', ['service_id' => $booking->service_id])); ?>" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-gray-700 hover:bg-gray-50">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700">
                            Update Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/bookings/edit.blade.php ENDPATH**/ ?>