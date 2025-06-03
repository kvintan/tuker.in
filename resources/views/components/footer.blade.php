<footer>
    <div class="mx-auto w-full max-w-screen-xl p-6 lg:py-8 bg-[#040F02] rounded-2xl">
        <div class="md:flex md:justify-between md:items-start">

            <div class="mb-6 md:mb-0 flex flex-col items-start gap-4 ml-10 max-w-sm">
                <img src="{{ asset('images/logoFooter.png') }}" class="w-48" alt="FlowBite Logo" />
                <span class="text-lg font-inter font-medium text-[#B8B6B0] break-words">
                    Lorep ipsum dolor sit amet Lorep ipsum dolor sit amet Lorep ipsum dolor sit amet Lorep
                </span>
                <div class="flex items-center text-[#B8B6B0] space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10c0 7-7.5 11-7.5 11S4.5 17 4.5 10a7.5 7.5 0 1115 0z" />
                    </svg>
                    <span>Bogor, Indonesia</span>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-8 sm:gap-6">
                <div class="flex flex-col justify-between">
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-1.5"><a href="/" class="hover:underline font-inter">Home</a></li>
                        <li class="mb-1.5"><a href="/pickup" class="hover:underline font-inter">Pick Up</a></li>
                        <li class="mb-1.5"><a href="/product" class="hover:underline font-inter">Product</a></li>
                        <li class="mb-1.5"><a href="/community" class="hover:underline font-inter">Community</a></li>
                        <li class="mb-1.5"><a href="/about" class="hover:underline font-inter">About Us</a></li>
                    </ul>

                    <div class="flex justify-end mt-6 space-x-6">
                        <img src="{{ asset('images/ig.png') }}" alt="Instagram" class="w-8 h-8 cursor-pointer" />
                        <img src="{{ asset('images/linkedin.png') }}" alt="LinkedIn" class="w-8 h-8 cursor-pointer" />
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-6 w-11/12 border-[#B8B6B0] sm:mx-auto lg:my-8 border-4 rounded-2xl" />
    </div>
</footer>