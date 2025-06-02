<nav class="border-b border-black mx-8" x-data="{ isOpen: false }">
    <div class="w-full px-4">
        <div class="relative flex h-16 items-center justify-between max-w-full mx-auto">

            <!-- Navigasi kiri -->
            <div class="hidden md:flex space-x-8 items-center">
                <x-nav-link href="/" :active="request()->is('pickup')">Pick Up</x-nav-link>
                <x-nav-link href="/posts" :active="request()->is('auction')">Auction</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('product')">Product</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('community')">Community</x-nav-link>
            </div>

            <!-- Logo tengah -->
            <a href="/" class="cursor-pointer">
                <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 select-none" draggable="false">
                    <img class="w-44 h-auto" src="{{ asset('images/logo.png') }}" alt="Tukerin Logo" />
                </div>
            </a>

            <!-- Profil kanan -->
            <div class="hidden md:flex items-center space-x-4">
                <div class="hidden md:flex space-x-8 items-center">
                    <x-nav-link href="/" :active="request()->is('about')">About Us</x-nav-link>
                </div>
                <div class="relative">
                    <a href="/cart" class="text-gray-600 hover:text-gray-800 relative">
                        <!-- Icon keranjang -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m14-9l2 9M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
                        </svg>

                        <!-- Badge jumlah item -->
                        <span
                            class="absolute -top-2 -right-2 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
                            3
                        </span>
                    </a>
                </div>
                <div class="relative">
                    <button type="button" @click="isOpen = !isOpen"
                        class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-10 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User avatar" />
                    </button>

                    <div x-show="isOpen" x-transition
                        @click.away="isOpen = false" @keydown.escape.window="isOpen = false"
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                    class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <x-nav-link href="/" :active="request()->is('/')">Pick Up</x-nav-link>
            <x-nav-link href="/posts" :active="request()->is('posts')">Auction</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">Product</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')">Community</x-nav-link>
        </div>
        <div class="border-t border-gray-700 pt-4 pb-3">
            <div class="flex items-center px-5">
                <div class="shrink-0">
                    <img class="w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-white">Tom Cook</div>
                    <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                    Profile</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                    out</a>
            </div>
        </div>
    </div>
</nav>