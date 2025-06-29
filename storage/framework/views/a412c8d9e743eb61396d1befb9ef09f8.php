<div class="w-full bg-white shadow mb-6">
    <div class="container mx-auto flex items-center justify-between py-4 px-8">
        <div class="flex items-center space-x-3">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="h-10 w-10 object-cover rounded" />
            <span class="font-bold text-xl tracking-wide">GoGig</span>
        </div>
        <nav class="flex space-x-4">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->role === 'performer'): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="font-semibold hover:underline">Home</a>
                    <a href="<?php echo e(route('profile.show')); ?>" class="font-semibold hover:underline">Profile</a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button class="font-semibold hover:underline text-red-600">Logout</button>
                    </form>
                <?php elseif(auth()->user()->role === 'organizer'): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="font-semibold hover:underline">Home</a>
                    <a href="<?php echo e(route('profile.show')); ?>" class="font-semibold hover:underline">Profile</a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button class="font-semibold hover:underline text-red-600">Logout</button>
                    </form>
                <?php elseif(auth()->user()->role === 'admin'): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="font-semibold hover:underline">Home</a>
                    <a href="<?php echo e(route('profile.show')); ?>" class="font-semibold hover:underline">Profile</a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button class="font-semibold hover:underline text-red-600">Logout</button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('home')); ?>" class="font-semibold hover:underline">Home</a>
                <a href="<?php echo e(route('login')); ?>" class="font-semibold hover:underline">Login</a>
                <a href="<?php echo e(route('register')); ?>" class="font-semibold hover:underline">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</div>
<?php /**PATH C:\gogig\resources\views/partials/header.blade.php ENDPATH**/ ?>