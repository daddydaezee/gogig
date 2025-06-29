
<?php $__env->startSection('title', $event->name); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto py-10">
    
    <div class="mb-6 flex justify-center">
        <img 
            src="<?php echo e(asset($event->poster ? 'storage/'.$event->poster : 'images/event-placeholder.png')); ?>" 
            alt="<?php echo e($event->name); ?>"
            class="rounded-xl shadow-lg w-full max-w-3xl object-cover" 
            style="aspect-ratio: 16/7; background: #111;"/>
    </div>

    
    <h1 class="text-3xl md:text-4xl font-bold mb-2"><?php echo e($event->name); ?></h1>

    <div class="mb-4">
        <div class="mb-2"><span class="font-semibold">Location:</span> <?php echo e($event->location); ?></div>
        <div class="mb-2"><span class="font-semibold">Date:</span> <?php echo e($event->start_date); ?> – <?php echo e($event->end_date); ?></div>
        <div class="mb-2"><span class="font-semibold">Time:</span> <?php echo e($event->start_time ?? '-'); ?> – <?php echo e($event->end_time ?? '-'); ?></div>
        <div class="mb-2">
            <span class="font-semibold">Organizer:</span>
                <?php if($event->organizer): ?>
                    <a href="<?php echo e(route('profile.public', $event->organizer->id)); ?>" class="text-indigo-700 hover:underline">
                        <?php echo e($event->organizer->username); ?>

                    </a>
                <?php else: ?>
                    -
                <?php endif; ?>
        </div>
        <div class="mb-2"><span class="font-semibold">Description:</span>
            <p class="mt-1"><?php echo e($event->description); ?></p>
        </div>
    </div>

    
    <div class="mb-8">
        <h3 class="font-bold mb-2 text-lg">Line-Up / Performers</h3>
        <div class="flex flex-wrap gap-4">
            <?php $__empty_1 = true; $__currentLoopData = $performers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="flex flex-col items-center">
                    <?php if($perf->profile && $perf->profile->photo): ?>
                        <img src="<?php echo e(asset('storage/'.$perf->profile->photo)); ?>" class="h-14 w-14 rounded-full mb-1" />
                    <?php endif; ?>
                    <div class="text-sm font-semibold">
                        <a href="<?php echo e(route('profile.public', $perf->id)); ?>" class="text-indigo-700 hover:underline">
                            <?php echo e($perf->username); ?>

                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <span class="text-gray-500">No performers yet.</span>
            <?php endif; ?>
        </div>
    </div>

    <div class="flex gap-8 mb-6 items-center">
        <a href="<?php echo e(route('dashboard')); ?>" class="text-indigo-700 hover:underline">Back to Dashboard</a>
        <a href="<?php echo e(route('events.index')); ?>" class="text-indigo-700 hover:underline">Back to All Events</a>
        <?php if(auth()->guard()->check()): ?>
            <?php
                $user = Auth::user();
            ?>

            
            <?php if($user->role === 'organizer' && $user->id === $event->organizer_id): ?>
                <a href="<?php echo e(route('events.edit', $event->id)); ?>" class="btn btn-sm bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 ml-4">Edit Event</a>
            <?php endif; ?>

            
            <?php if(
                ($user->role === 'organizer' && $user->id === $event->organizer_id)
                || $user->role === 'admin'
            ): ?>
                <form action="<?php echo e(route('events.destroy', $event->id)); ?>" method="POST" class="inline ml-2" onsubmit="return confirm('Are you sure you want to delete this event?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete Event</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/events/show.blade.php ENDPATH**/ ?>