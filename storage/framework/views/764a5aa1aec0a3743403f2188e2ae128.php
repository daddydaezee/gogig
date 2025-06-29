
<?php $__env->startSection('title', 'Applications for ' . $event->name); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Applications for "<?php echo e($event->name); ?>"</h2>
    <div class="bg-white rounded shadow">
        <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex items-center justify-between border-b p-4">
                <div class="flex items-center gap-4">
                    <?php if($app->user->profile && $app->user->profile->photo): ?>
                        <img src="<?php echo e(asset('storage/'.$app->user->profile->photo)); ?>" class="h-12 w-12 rounded-full object-cover" />
                    <?php endif; ?>
                    <div>
                        <div class="font-semibold"><?php echo e($app->user->username); ?></div>
                        <div class="text-gray-500 text-xs"><?php echo e($app->user->email); ?></div>
                        <div class="text-sm text-gray-600 mt-1"><?php echo e($app->message ?? '-'); ?></div>
                    </div>
                </div>
                <div>
                    <span class="capitalize font-semibold text-xs <?php echo e($app->status === 'approved' ? 'text-green-700' : ($app->status === 'rejected' ? 'text-red-700' : 'text-gray-700')); ?>">
                        <?php echo e($app->status); ?>

                    </span>
                    <?php if($app->status === 'pending'): ?>
                    <form method="POST" action="<?php echo e(route('applications.approve', $app->id)); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-success btn-xs mx-1">Approve</button>
                    </form>
                    <form method="POST" action="<?php echo e(route('applications.reject', $app->id)); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger btn-xs">Reject</button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-8 text-gray-500">No applications yet.</div>
        <?php endif; ?>
    </div>
    <a href="<?php echo e(route('dashboard')); ?>" class="mt-4 inline-block text-indigo-700 hover:underline">Back to Dashboard</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/applications/list.blade.php ENDPATH**/ ?>