
<?php $__env->startSection('title', 'Admin Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Hi, Admin</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-4xl font-bold text-indigo-700"><?php echo e($totalUsers ?? 0); ?></div>
            <div class="text-gray-600 mt-2">Total Users</div>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-4xl font-bold text-indigo-700"><?php echo e($totalEvents ?? 0); ?></div>
            <div class="text-gray-600 mt-2">Total Events</div>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-4xl font-bold text-yellow-500"><?php echo e($approvalsPending ?? 0); ?></div>
            <div class="text-gray-600 mt-2">Approvals Pending</div>
        </div>
    </div>

    <section class="mb-8">
        <h3 class="font-bold text-lg mb-2">Event Published</h3>
        <div class="flex flex-wrap gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $events->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="w-80 bg-white rounded shadow p-2">
                    <img src="<?php echo e(asset($event->poster ? 'storage/'.$event->poster : 'images/event-placeholder.png')); ?>" class="w-full h-32 object-cover rounded mb-4" />
                    <div class="font-semibold"><?php echo e($event->name); ?></div>
                    <div class="text-sm text-gray-500"><?php echo e($event->location); ?> | <?php echo e($event->start_date); ?></div>
                    <a href="<?php echo e(route('events.show', $event->id)); ?>" class="btn btn-sm mt-4">View</a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-gray-400 text-center w-full">No events found.</div>
            <?php endif; ?>
        </div>
        <?php if($events->count() > 3): ?>
            <div class="mt-4">
                <a href="<?php echo e(route('events.index')); ?>" class="btn btn-outline-primary">See More>></a>
            </div>
        <?php endif; ?>
    </section>

    <section>
        <h3 class="font-bold text-lg mb-2">Sponsor Request Approval</h3>
        <div class="bg-white rounded shadow">
            <?php $__currentLoopData = $pendingSponsorRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex justify-between items-center border-b px-4 py-2">
                    <div>
                        <div>Event: <?php echo e($req->event->name); ?> (<?php echo e($req->event->organizer->username); ?>)</div>
                        <div class="text-xs text-gray-500">Sponsor: <?php echo e($req->sponsor->name ?? '-'); ?> | <?php echo e($req->sponsor->type ?? '-'); ?> | Amount: <?php echo e($req->sponsor->amount ?? '-'); ?></div>
                    </div>
                    <div>
                        <form action="<?php echo e(route('admin.sponsor-approve', $req->id)); ?>" method="POST" class="inline"><?php echo csrf_field(); ?>
                            <button class="btn btn-success">Approve</button>
                        </form>
                        <form action="<?php echo e(route('admin.sponsor-reject', $req->id)); ?>" method="POST" class="inline"><?php echo csrf_field(); ?>
                            <button class="btn btn-danger">Reject</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/dashboard/admin.blade.php ENDPATH**/ ?>