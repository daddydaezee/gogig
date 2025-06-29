

<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto mt-12 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Create New Event</h2>
    <?php if($errors->any()): ?>
        <div class="mb-4 text-red-600">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($err); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('events.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Event Name</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" required value="<?php echo e(old('name')); ?>">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Location</label>
            <input type="text" name="location" class="w-full border px-3 py-2 rounded" required value="<?php echo e(old('location')); ?>">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Start Date</label>
            <input type="date" name="start_date" class="w-full border px-3 py-2 rounded" required value="<?php echo e(old('start_date')); ?>">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">End Date</label>
            <input type="date" name="end_date" class="w-full border px-3 py-2 rounded" required value="<?php echo e(old('end_date')); ?>">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Start Time</label>
            <input type="time" name="start_time" class="w-full border px-3 py-2 rounded" required value="<?php echo e(old('start_time')); ?>">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">End Time</label>
            <input type="time" name="end_time" class="w-full border px-3 py-2 rounded" required value="<?php echo e(old('end_time')); ?>">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded"><?php echo e(old('description')); ?></textarea>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Event Poster (optional)</label>
            <input type="file" name="poster" accept="image/*" class="w-full">
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded font-bold">Create Event</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/events/create.blade.php ENDPATH**/ ?>