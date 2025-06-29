<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white rounded-lg shadow-xl flex max-w-4xl w-full overflow-hidden">
        <!-- FORM -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold mb-1">Forgot Password?</h2>
            <p class="mb-8 text-gray-600">We'll send a password reset link to your email.</p>
            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <input id="email" type="email" name="email" placeholder="Email" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded font-bold hover:bg-indigo-700">Send Reset Link</button>
            </form>
            <div class="mt-4 text-sm text-gray-500">
                <a href="<?php echo e(route('login')); ?>" class="text-indigo-600 font-semibold hover:underline">Back to Login</a>
            </div>
        </div>
        <!-- IMAGE -->
        <div class="hidden md:flex md:w-1/2 bg-gray-200 items-center justify-center">
            <img src="/images/forgot-password.png" alt="Picture" class="max-w-s rounded" />
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>