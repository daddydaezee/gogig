<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - GoGig</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg flex overflow-hidden w-full max-w-3xl">
        <!-- Left side image -->
        <div class="hidden md:flex w-1/2 bg-indigo-50  items-center justify-center">
            <img src="<?php echo e(asset('images/login.png')); ?>" alt="GoGig Login" class="max-w-s rounded" />
        </div>
        <!-- Right side form -->
        <div class="w-full md:w-1/2 px-8 py-10">
            <h2 class="text-2xl font-bold mb-6 text-indigo-700">Login to GoGig</h2>
            <?php if(session('error')): ?>
                <div class="mb-4 text-red-600 font-semibold">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-5">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="username" class="block font-semibold mb-1">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo e(old('username')); ?>"
                        class="border rounded w-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400" required autofocus>
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-xs"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label for="password" class="block font-semibold mb-1">Password</label>
                    <input type="password" name="password" id="password"
                        class="border rounded w-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-xs"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-bold py-2 rounded hover:bg-indigo-700 transition">Login</button>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <a href="<?php echo e(route('password.request')); ?>" class="text-sm text-indigo-600 hover:underline">Forgot password?</a>
                    <a href="<?php echo e(route('register')); ?>" class="text-sm text-indigo-600 hover:underline">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\gogig\resources\views/auth/login.blade.php ENDPATH**/ ?>