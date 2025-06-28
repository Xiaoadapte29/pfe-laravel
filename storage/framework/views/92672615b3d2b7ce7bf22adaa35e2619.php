

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">Client Dashboard</h1>
                    <p class="text-gray-600">Manage your bookings for the service <strong><?php echo e($service->name); ?></strong></p>
                </div>
                <a href="<?php echo e(route('services.index')); ?>" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-gray-700 hover:bg-gray-50">
                    ← Back to Services
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow sticky top-6">
                        <div class="p-6">
                            <!-- New Booking button -->
                            <a href="<?php echo e(route('bookings.create', ['service_id' => $service->id])); ?>" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md flex items-center justify-center">
                                + New Booking
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">
                    <?php if(session('success')): ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline"><?php echo e(session('success')); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">Booking History</h2>

                            <?php if($bookings->isEmpty()): ?>
                                <div class="text-center py-8">
                                    <p class="text-gray-500 mb-4">No bookings yet.</p>
                                    <a href="<?php echo e(route('bookings.create', ['service_id' => $service->id])); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                                        Create Your First Booking
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div>
                                                            <div class="font-medium"><?php echo e(\Carbon\Carbon::parse($booking->scheduled_at)->format('l, F j, Y')); ?></div>
                                                            <div class="text-sm text-gray-500"><?php echo e(\Carbon\Carbon::parse($booking->scheduled_at)->format('g:i A')); ?></div>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div>
                                                            <div class="font-medium"><?php echo e($booking->name); ?></div>
                                                            <div class="text-sm text-gray-500"><?php echo e($booking->email); ?></div>
                                                            <div class="text-sm text-gray-500"><?php echo e($booking->phone); ?></div>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <?php
                                                            $statusClasses = [
                                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                               'accepted' => 'bg-blue-100 text-blue-800',
                                                                'cancelled' => 'bg-red-100 text-red-800',
                                                                'completed' => 'bg-green-100 text-green-800',
                                                            ];
                                                        ?>

                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo e($statusClasses[$booking->status]); ?>">
                                                            <?php echo e(ucfirst($booking->status)); ?>

                                                        </span>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <div class="flex gap-2">
                                                            <a href="<?php echo e(route('bookings.edit', $booking->id)); ?>" class="text-blue-600 hover:text-blue-900">Edit</a>

                                                            <?php if($booking->status === 'confirmed'): ?>
                                                                <form method="POST" action="<?php echo e(route('bookings.cancel', $booking->id)); ?>" class="inline">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('PATCH'); ?>
                                                                    <button type="submit" class="text-yellow-600 hover:text-yellow-900">Cancel</button>
                                                                </form>
                                                            <?php endif; ?>

                                                            <form method="POST" action="<?php echo e(route('bookings.destroy', $booking->id)); ?>" class="inline">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php if($booking->status === 'completed'): ?>
                                                    <tr>
                                                        <td colspan="4" class="px-6 py-2 bg-gray-50">
                                                            <?php if($booking->review): ?>
                                                                <div class="p-3 rounded border border-green-300 bg-green-100">
                                                                    <strong>Your Review:</strong> 
                                                                    <br>Rating: <?php echo e($booking->review->rating); ?> / 5
                                                                    <p><?php echo e($booking->review->comment); ?></p>
                                                                </div>
                                                            <?php else: ?>
                                                                <form method="POST" action="<?php echo e(route('reviews.store', $booking->id)); ?>">
                                                                    <?php echo csrf_field(); ?>
                                                                    <label class="block font-semibold mb-1">Leave a Review:</label>
                                                                    <select name="rating" required class="border rounded px-2 py-1 mb-2">
                                                                        <option value="" disabled selected>Rate 1-5</option>
                                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                    <textarea name="comment" placeholder="Write your comment (optional)" rows="2" class="w-full border rounded px-2 py-1 mb-2"></textarea>
                                                                    <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Submit Review</button>
                                                                </form>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/bookings/index.blade.php ENDPATH**/ ?>