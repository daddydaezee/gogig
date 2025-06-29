<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white rounded-lg shadow-xl flex max-w-3xl w-full overflow-hidden">
        <!-- IMAGE -->
        <div class="hidden md:flex md:w-1/2 bg-gray-200 items-center justify-center">
            <img src="/images/register.jpg" alt="Picture" class="max-w-s rounded" />
        </div>
        <!-- FORM -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold mb-1">Let's Rock n' Roll</h2>
            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <input id="username" type="text" name="username" placeholder="Username" required autofocus class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" value="<?php echo e(old('username')); ?>">
                </div>
                <div class="mb-3">
                    <input id="email" type="email" name="email" placeholder="Email" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" value="<?php echo e(old('email')); ?>">
                </div>
                <div class="mb-3">
                    <select id="role" name="role" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                        <option value="">Role</option>
                        <option value="performer">Performer</option>
                        <option value="organizer">Organizer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input id="password" type="password" name="password" placeholder="Password" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                </div>
                <div class="mb-3">
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-confirm Password" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded font-bold hover:bg-indigo-700">Register</button>
            </form>
            <div class="mt-4 text-sm text-gray-500">
                You Seems Familiar, 
                <a href="<?php echo e(route('login')); ?>" class="text-indigo-600 font-semibold hover:underline">Login Here</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/auth/register.blade.php ENDPATH**/ ?>