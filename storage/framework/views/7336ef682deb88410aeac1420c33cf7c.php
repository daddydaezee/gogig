
<?php $__env->startSection('title', 'Performer Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto py-8">

    <h2 class="text-xl font-bold mb-4">Hi, <span class="text-indigo-700"><?php echo e(Auth::user()->username); ?></span></h2>

    
    <h3 class="text-lg font-bold mb-2">Applied Events</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        <?php $__empty_1 = true; $__currentLoopData = $appliedEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-lg shadow p-2 flex flex-col items-center">
                <img src="<?php echo e($app->event->poster ? asset('storage/'.$app->event->poster) : asset('images/event-placeholder.png')); ?>" class="w-48 h-32 object-cover rounded mb-2" />
                <div class="font-semibold"><?php echo e($app->event->name ?? '-'); ?></div>
                <div class="text-sm text-gray-500"><?php echo e($app->event->location ?? '-'); ?></div>
                <div class="text-xs text-gray-400 mb-1"><?php echo e($app->event->start_date ?? '-'); ?></div>
                <span>Status: <b><?php echo e(ucfirst($app->status)); ?></b></span>
                <a href="<?php echo e(route('events.show', $app->event->id)); ?>" class="btn btn-sm mt-2">Detail</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 text-gray-400 py-8 text-center">No events applied yet.</div>
        <?php endif; ?>
    </div>

    
    <div class="flex items-center mb-2">
        <h3 class="text-lg font-bold">Upcoming Events</h3>
        <a href="<?php echo e(route('events.index')); ?>" class="ml-auto text-indigo-600 hover:underline text-sm">See More &gt;</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        <?php $__empty_1 = true; $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-lg shadow p-2 flex flex-col items-center">
                <img src="<?php echo e($event->poster ? asset('storage/'.$event->poster) : asset('images/event-placeholder.png')); ?>" class="w-48 h-32 object-cover rounded mb-2" />
                <div class="font-semibold"><?php echo e($event->name); ?></div>
                <div class="text-sm text-gray-500"><?php echo e($event->location); ?></div>
                <div class="text-xs text-gray-400 mb-1"><?php echo e($event->start_date); ?></div>
                <form action="<?php echo e(route('events.apply', $event)); ?>" method="POST"><?php echo csrf_field(); ?>
                    <button class="btn btn-sm">Apply</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 text-gray-400 py-8 text-center">No upcoming events available.</div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/dashboard/performer.blade.php ENDPATH**/ ?>