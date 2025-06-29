
<?php $__env->startSection('title', $user->username); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto py-8">
    <div class="bg-white rounded shadow-lg p-8 flex flex-col md:flex-row items-center mb-8">
        <div class="w-36 h-36 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden mb-4 md:mb-0 md:mr-8">
            <?php if($profile && $profile->photo): ?>
                <img src="<?php echo e(asset('storage/'.$profile->photo)); ?>" class="object-cover w-full h-full">
            <?php else: ?>
                <span class="text-5xl text-gray-400">?</span>
            <?php endif; ?>
        </div>
        <div class="flex-1">
            <div class="flex items-center">
                <h2 class="text-3xl font-bold mr-2"><?php echo e($user->username); ?></h2>
                <span class="text-gray-600 capitalize"><?php echo e(ucfirst($user->role)); ?></span>
            </div>
            <div class="mt-2">
                <div><b>Phone:</b> <?php echo e($profile->phone ?? '-'); ?></div>
                <div><b>Address:</b> <?php echo e($profile->address ?? '-'); ?></div>
                <div><b>Contact Email:</b> <?php echo e($profile->contact_email ?? '-'); ?></div>
            </div>
            <div class="mt-2"><b>Social Media</b></div>
            <div>
                <?php if(!empty($profile->instagram)): ?>
                    <span>Instagram: <?php echo e($profile->instagram); ?></span>
                <?php endif; ?>
                <?php if(!empty($profile->facebook)): ?>
                    <span class="ml-3">Facebook: <?php echo e($profile->facebook); ?></span>
                <?php endif; ?>
                <?php if(!empty($profile->x)): ?>
                    <span class="ml-3">X: <?php echo e($profile->x); ?></span>
                <?php endif; ?>
            </div>
            <?php if((!isset($public) || !$public) && Auth::id() === $user->id): ?>
                <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary mt-4">Edit Profile</a>
            <?php endif; ?>
        </div>
    </div>

    
    <?php if($user->role !== 'admin'): ?>
        <div class="mb-8">
            <h3 class="font-bold text-xl mb-2">Media Portfolio</h3>
            <?php if($media && count($media)): ?>
                <div class="flex flex-wrap gap-4">
                    <?php $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <?php if(Str::endsWith($m->file, ['.jpg','.jpeg','.png','.gif'])): ?>
                                <img src="<?php echo e(asset('storage/'.$m->file)); ?>" class="w-32 h-32 object-cover rounded mb-1" />
                            <?php else: ?>
                                <a href="<?php echo e(asset('storage/'.$m->file)); ?>" target="_blank"><?php echo e($m->file); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="text-gray-500">No media uploaded yet.</div>
            <?php endif; ?>
        </div>

        <div class="mb-8">
            <h3 class="font-bold text-xl mb-2">Reviews</h3>
            <?php if($reviews && count($reviews)): ?>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border-b py-2">
                        <span class="font-semibold"><?php echo e($review->reviewer->username); ?></span>
                        <span class="ml-2 text-yellow-500">
                            <?php echo e(str_repeat('★', $review->rating)); ?><?php echo e(str_repeat('☆', 5-$review->rating)); ?>

                        </span>
                        <div><?php echo e($review->comment); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="text-gray-500">No reviews yet.</div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/profile/show.blade.php ENDPATH**/ ?>