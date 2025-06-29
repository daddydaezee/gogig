
<?php $__env->startSection('title', 'Organizer Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Hi, <?php echo e($user->username); ?></h1>
    <section class="mb-8">
        <h2 class="font-bold text-lg mb-2">Your Events</h2>
        <div class="flex flex-wrap gap-6">
            <?php $__currentLoopData = $myEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-100 bg-white rounded shadow p-2">
                    <img src="<?php echo e(asset($event->poster ? 'storage/'.$event->poster : 'images/event-placeholder.png')); ?>" class="w-45 h-32 object-cover rounded mb-2" />
                    <div class="font-semibold"><?php echo e($event->name); ?></div>
                    <div class="text-sm text-gray-500"><?php echo e($event->location); ?> | <?php echo e($event->start_date); ?></div>
                    <a href="<?php echo e(route('events.show', $event->id)); ?>" class="btn btn-sm mt-2">View</a>
                    <a href="<?php echo e(route('events.edit', $event->id)); ?>" class="btn btn-sm btn-outline mt-2">Edit</a>
                    <a href="<?php echo e(route('applications.list', $event->id)); ?>" class="btn btn-sm btn-outline mt-2">Applications</a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('events.create')); ?>" class="w-60 flex flex-col items-center justify-center border-2 border-dashed border-indigo-400 rounded p-8 text-indigo-700 hover:bg-indigo-50 transition-all">
                <span class="text-5xl mb-2">+</span>
                <span class="font-bold">Add New Event</span>
            </a>
        </div>
    </section><br>
    <section>
    <h2 class="font-bold text-lg mb-2">Performer Applications</h2>
    <div class="w-75 bg-white rounded shadow">
        <?php $__empty_1 = true; $__currentLoopData = $myApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex justify-between items-center border-b px-4 py-2">
                <div>
                    <img src="<?php echo e(asset($app->event && $app->event->poster ? 'storage/'.$app->event->poster : 'images/event-placeholder.png')); ?>" class="w-45 h-32 object-cover rounded mb-2" />

                    <div class="font-bold">Event: <?php echo e($app->event->name ?? '-'); ?></div>
                    <div class="font-bold text-xs text-gray-700">
                        Performer: <?php echo e($app->user->username ?? '-'); ?>

                        <?php if($app->user->profile && $app->user->profile->photo): ?>
                            <img src="<?php echo e(asset('storage/'.$app->user->profile->photo)); ?>" class="inline h-6 w-6 rounded-full ml-1" />
                        <?php endif; ?>
                    </div>
                    <div>
                        Status:
                        <span class="font-bold capitalize 
                            <?php echo e($app->status == 'approved' ? 'text-green-600' : 
                               ($app->status == 'rejected' ? 'text-red-600' : 'text-gray-700')); ?>">
                            <?php echo e($app->status); ?>

                        </span>
                    </div>
                </div>
                <div>
                    <?php if($app->status == 'pending'): ?>
                        <form method="POST" action="<?php echo e(route('applications.approve', $app)); ?>" class="inline"><?php echo csrf_field(); ?>
                            <button
                                type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white py-1 px-3 rounded font-semibold mr-2"
                            >
                                Approve
                            </button>
                        </form>
                        <form method="POST" action="<?php echo e(route('applications.reject', $app)); ?>" class="inline"><?php echo csrf_field(); ?>
                            <button
                                type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded font-semibold"
                            >
                                Reject
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="px-4 py-8 text-gray-400 text-center">No performer applications yet.</div>
        <?php endif; ?>
    </div>
</section>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/dashboard/organizer.blade.php ENDPATH**/ ?>