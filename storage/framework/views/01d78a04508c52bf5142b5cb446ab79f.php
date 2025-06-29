<?php $__env->startSection('title', 'Welcome'); ?>
<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex flex-col">

    
    <header class="flex items-center justify-between px-8 py-4 border-b">
        <div class="flex items-center gap-2">
            <img src="<?php echo e(asset('images/logo.png')); ?>" class="h-12" alt="GoGig Logo">
            <span class="text-2xl font-extrabold">GoGig</span>
        </div>
        <nav class="flex gap-4 items-center">
            <a href="#gogig" class="btn-link">Home</a>
            <a href="#artist" class="btn-link">Artist</a>
            <a href="#organizer" class="btn-link">Organizer</a>
            <a href="<?php echo e(route('events.index')); ?>" class="btn-link">Event</a>
            <a href="<?php echo e(route('login')); ?>" class="px-5 py-1 border rounded bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition">LOGIN</a>
        </nav>
    </header>

    <main class="flex-1 px-4 py-8 max-w-3xl mx-auto w-full">

        
        <h1 id="gogig" class="text-center text-3xl font-extrabold mt-6 mb-2">GOGIG</h1>
        <h2 class="text-center text-lg font-semibold mb-4 text-gray-600">One Stop Platform for Music Lover</h2>
        
        
        <div class="mx-auto mb-10 max-w-xxl border rounded p-5 text-center text-gray-700 bg-gray-50">
            The GoGig platform seeks to bridge the gap between event organizers and musicians
            via a systematic and user-friendly digital platform. Musicians currently rely primarily on word of mouth and social media to secure gigs, so new 
            and upcoming artists cannot be heard. Similarly, event planners are struggling to find suitable performers since there is no single centralized solution for booking and logistics. 
            GoGig aims to solve these issues by offering both an extensive platform of both musicians and artists for gig solutions, recommendations, and matching with 
            event planners in a safe and open environment. The site also facilitates easier payments, application management, and communication tools to allow for a seamless gig matching process.
        </div>

        
        <h3 id="artist" class="text-xl font-bold mb-3 text-center mt-8">Certified Artist</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-2">
            
            <div class="flex gap-3 items-center border rounded p-4 bg-white min-h-[100px]">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    
                    <span class="text-xs text-gray-400">Artist 1</span>
                </div>
                <div class="font-semibold">Artist 1</div>
            </div>
            <div class="flex gap-3 items-center border rounded p-4 bg-white min-h-[100px]">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    
                    <span class="text-xs text-gray-400">Artist 2</span>
                </div>
                <div class="font-semibold">Artist 2</div>
            </div>
            <div class="flex gap-3 items-center border rounded p-4 bg-white min-h-[100px]">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    
                    <span class="text-xs text-gray-400">Artist 3</span>
                </div>
                <div class="font-semibold">Artist 3</div>
            </div>
            <div class="flex gap-3 items-center border rounded p-4 bg-white min-h-[100px]">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    
                    <span class="text-xs text-gray-400">Artist 4</span>
                </div>
                <div class="font-semibold">Artist 4</div>
            </div>
        </div>
        <div class="text-center text-sm font-semibold text-gray-500 mb-10">And Many More Artists</div>

        
        <h3 id="organizer" class="text-xl font-bold mb-3 text-center mt-10">Certified Organizer</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-2">
            
            <div class="flex gap-3 items-center border rounded p-4 bg-white min-h-[100px]">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    
                    <span class="text-xs text-gray-400">Organizer 1</span>
                </div>
                <div class="font-semibold">Organizer 1</div>
            </div>
            <div class="flex gap-3 items-center border rounded p-4 bg-white min-h-[100px]">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    
                    <span class="text-xs text-gray-400">Organizer 2</span>
                </div>
                <div class="font-semibold">Organizer 2</div>
            </div>
            <div class="flex gap-3 items-center border rounded p-4 bg-white min-h-[100px]">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    
                    <span class="text-xs text-gray-400">Organizer 3</span>
                </div>
                <div class="font-semibold">Organizer 3</div>
            </div>
            <div class="flex gap-3 items-center border rounded p-4 bg-white min-h-[100px]">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    
                    <span class="text-xs text-gray-400">Organizer 4</span>
                </div>
                <div class="font-semibold">Organizer 4</div>
            </div>
        </div>
        <div class="text-center text-sm font-semibold text-gray-500 mb-10">And Many More Organizers</div>

        
        <div class="w-full my-10">
            <div class="w-full h-full sm:h-full bg-gray-200 rounded flex items-center justify-center text-2xl text-gray-400 border-2 border-dashed">
                <img src="<?php echo e(asset('images/organizer-benefits.png')); ?>" class="w-full h-full sm:h-full bg-gray-200 rounded flex items-center" alt="organizer benefits">
            </div>
        </div>
        <div class="w-full my-10">
            <div class="w-full h-full sm:h-full bg-gray-200 rounded flex items-center justify-center text-2xl text-gray-400 border-2 border-dashed">
                <img src="<?php echo e(asset('images/performer-benefits.png')); ?>" class="w-full h-full sm:h-full bg-gray-200 rounded flex items-center" alt="performer benefits">
            </div>
        </div>

        
        <div class="flex justify-center mb-8">
            <a href="<?php echo e(route('register')); ?>" class="px-8 py-2 bg-indigo-600 text-white rounded font-bold hover:bg-indigo-700 transition">REGISTER NOW</a>
        </div>

    </main>

    
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\gogig\resources\views/welcome.blade.php ENDPATH**/ ?>