
<?php $__env->startSection('title', 'Edit Event'); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Edit Event</h2>

    <?php if($errors->any()): ?>
        <div class="mb-4 text-red-600">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($err); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('events.update', $event)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-4">
            <label class="block mb-1">Event Name</label>
            <input type="text" name="name" class="border p-2 rounded w-full" value="<?php echo e(old('name', $event->name)); ?>" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Location</label>
            <input type="text" name="location" class="border p-2 rounded w-full" value="<?php echo e(old('location', $event->location)); ?>" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Start Date</label>
            <input type="date" name="start_date" class="border p-2 rounded w-full" value="<?php echo e(old('start_date', $event->start_date)); ?>" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">End Date</label>
            <input type="date" name="end_date" class="border p-2 rounded w-full" value="<?php echo e(old('end_date', $event->end_date)); ?>" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Start Time</label>
            <input type="time" name="start_time" class="border p-2 rounded w-full" value="<?php echo e(old('start_time', $event->start_time)); ?>" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">End Time</label>
            <input type="time" name="end_time" class="border p-2 rounded w-full" value="<?php echo e(old('end_time', $event->end_time)); ?>" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="border p-2 rounded w-full" rows="4"><?php echo e(old('description', $event->description)); ?></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Event Poster</label>
            <input type="file" name="poster" accept="image/*" class="border p-2 rounded w-full">
            <?php if($event->poster): ?>
                <img src="<?php echo e(asset('storage/'.$event->poster)); ?>" class="w-32 mt-2" />
            <?php endif; ?>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update Event</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/events/edit.blade.php ENDPATH**/ ?>