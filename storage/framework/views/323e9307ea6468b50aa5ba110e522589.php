

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">User Management</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="min-w-full border border-gray-200 rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 border-b">Name</th>
                <th class="p-3 border-b">Email</th>
                <th class="p-3 border-b">Role</th>
                <th class="p-3 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="hover:bg-gray-50">
                <td class="p-3 border-b"><?php echo e($user->name); ?></td>
                <td class="p-3 border-b"><?php echo e($user->email); ?></td>
                <td class="p-3 border-b capitalize"><?php echo e($user->role); ?></td>
                <td class="p-3 border-b space-x-2">
                    <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="text-blue-600 hover:underline">Edit</a>
                    <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" class="inline" onsubmit="return confirm('Delete this user?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/admin/partials/users-management.blade.php ENDPATH**/ ?>