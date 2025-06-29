<div class="w-full bg-white shadow mb-6">
    <div class="container mx-auto flex items-center justify-between py-4 px-8">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 object-cover rounded" />
            <span class="font-bold text-xl tracking-wide">GoGig</span>
        </div>
        <nav class="flex space-x-4">
            @auth
                @if(auth()->user()->role === 'performer')
                    <a href="{{ route('dashboard') }}" class="font-semibold hover:underline">Home</a>
                    <a href="{{ route('profile.show') }}" class="font-semibold hover:underline">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="font-semibold hover:underline text-red-600">Logout</button>
                    </form>
                @elseif(auth()->user()->role === 'organizer')
                    <a href="{{ route('dashboard') }}" class="font-semibold hover:underline">Home</a>
                    <a href="{{ route('profile.show') }}" class="font-semibold hover:underline">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="font-semibold hover:underline text-red-600">Logout</button>
                    </form>
                @elseif(auth()->user()->role === 'admin')
                    <a href="{{ route('dashboard') }}" class="font-semibold hover:underline">Home</a>
                    <a href="{{ route('profile.show') }}" class="font-semibold hover:underline">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="font-semibold hover:underline text-red-600">Logout</button>
                    </form>
                @endif
            @else
                <a href="{{ route('home') }}" class="font-semibold hover:underline">Home</a>
                <a href="{{ route('login') }}" class="font-semibold hover:underline">Login</a>
                <a href="{{ route('register') }}" class="font-semibold hover:underline">Register</a>
            @endauth
        </nav>
    </div>
</div>
