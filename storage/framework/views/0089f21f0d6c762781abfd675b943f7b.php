<table class="min-w-full border border-gray-200 rounded-lg">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3 border-b">Service Name</th>
            <th class="p-3 border-b">Category</th>
            <th class="p-3 border-b">Price</th>
            <th class="p-3 border-b">Professional</th>
            <th class="p-3 border-b">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="hover:bg-gray-50">
            <td class="p-3 border-b"><?php echo e($service->name); ?></td>
            <td class="p-3 border-b"><?php echo e($service->category->name ?? 'N/A'); ?></td>
            <td class="p-3 border-b"><?php echo e($service->price); ?></td>
            <td class="p-3 border-b"><?php echo e($service->professional->name ?? 'N/A'); ?></td>
            <td class="p-3 border-b space-x-2">
                <a href="" class="text-blue-600 hover:underline">Edit</a>
                <form action="" method="POST" class="inline"
                      onsubmit="return confirm('Delete this service?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/admin/partials/services-management.blade.php ENDPATH**/ ?>