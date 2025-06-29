
<?php $__env->startSection('title', 'All Upcoming Events'); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">All Upcoming Events</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-lg shadow p-2 flex flex-col items-center">
                <img src="<?php echo e($event->poster ? asset('storage/'.$event->poster) : asset('images/event-placeholder.png')); ?>" class="w-48 h-32 object-cover rounded mb-2" />
                <div class="font-semibold"><?php echo e($event->name); ?></div>
                <div class="text-sm text-gray-500"><?php echo e($event->location); ?></div>
                <div class="text-xs text-gray-400 mb-1"><?php echo e($event->start_date); ?></div>
                <a href="<?php echo e(route('events.show', $event)); ?>" class="btn btn-sm mb-2">View Details</a>

                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->role === 'performer'): ?>
                        
                        <?php
                            $alreadyApplied = auth()->user()->applications()->where('event_id', $event->id)->exists();
                        ?>
                        <?php if(!$alreadyApplied): ?>
                            <form action="<?php echo e(route('events.apply', $event)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-sm">Apply</button>
                            </form>
                        <?php else: ?>
                            <span class="text-green-600 text-xs font-semibold">Already Applied</span>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 text-gray-400 py-8 text-center">No upcoming events available.</div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/events/index.blade.php ENDPATH**/ ?>