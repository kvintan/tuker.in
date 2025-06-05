<x-layout>
    <div class="min-h-screen px-10 py-14">
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex flex-col items-center gap-6 w-full lg:w-1/4">
                <div class="relative">
                    <img src="{{ asset('images/chelsea.png') }}" alt="Profile Picture" class="w-56 h-56 object-cover rounded-full shadow-md border-4 border-white">
                    <div class="absolute bottom-2 right-2 bg-white p-1 rounded-full shadow cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h2l2-3h10l2 3h2a1 1 0 011 1v11a1 1 0 01-1 1H3a1 1 0 01-1-1V8a1 1 0 011-1z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11a3 3 0 100 6 3 3 0 000-6z" />
                        </svg>
                    </div>
                </div>

                <div class="w-full bg-white rounded-xl p-5 shadow space-y-4">
                    <h2 class="text-base font-semibold">Hi, Chelsea!</h2>
                    <hr>

                    <div class="flex items-center gap-4">
                        <div class="bg-[#649B35] rounded-full w-12 h-12 p-2 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 13a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Wallet</p>
                            <p class="text-md font-bold">Rp137.000</p>
                        </div>
                    </div>

                    <button
                        class="w-full bg-[#37654E] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-[#2d523f] transition duration-150">
                        Top up
                    </button>
                    <hr>

                    <div class="text-sm text-center text-gray-700 font-medium hover:underline cursor-pointer">
                        History
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-3/4">
                <div class="w-full bg-white p-8 rounded-xl shadow-md space-y-8">
                    <h1 class="text-2xl font-bold text-gray-800">Profile</h1>

                    <div class="space-y-4 text-base text-gray-700">
                        <div class="flex">
                            <span class="w-32 font-semibold">Name</span>
                            <span>: Chelsea Lelawananana</span>
                        </div>
                        <div class="flex">
                            <span class="w-32 font-semibold">Email</span>
                            <span>: celsillwnnn@gmail.com</span>
                        </div>
                        <div class="flex">
                            <span class="w-32 font-semibold">Phone</span>
                            <span>: +62 81213101996</span>
                        </div>
                        <div class="flex">
                            <span class="w-32 font-semibold">Address</span>
                            <span>: Jl. Pakuan Baru</span>
                        </div>
                    </div>

                    <div class="flex justify-start">
                        <button
                            class="bg-[#37654E] text-white px-6 py-2 text-sm font-medium rounded-lg hover:bg-[#2d523f] transition duration-150">
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>