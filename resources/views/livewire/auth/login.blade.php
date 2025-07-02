<div>
    <div class="flex flex-col items-center px-6 py-8 h-110 lg:py-0">
        <div class="w-full h-full bg-[#EFF5EC] rounded-4xl shadow border-1">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-center text-3xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Login
                </h1>

                {{-- Flash success message --}}
                @if (session()->has('success'))
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg text-center">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Auth error --}}
                @error('auth')
                    <div class="bg-red-100 text-red-800 px-4 py-2 rounded-lg text-center">
                        {{ $message }}
                    </div>
                @enderror

                <form wire:submit.prevent="login" class="space-y-4 md:space-y-6">
                    {{-- Email --}}
                    <div>
                        <label for="email" class="block mb-2 font-semibold font-inter text-xl">Email</label>
                        <input type="email" wire:model.defer="email" id="email" name="email"
                            class="bg-gray-50 border-1 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Enter your email" required>
                        @error('email')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block mb-2 font-semibold font-inter text-xl">Password</label>
                        <input type="password" wire:model.defer="password" id="password" name="password"
                            placeholder="••••••••"
                            class="bg-gray-50 border-1 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required>
                        @error('password')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex flex-col gap-5 items-center justify-center">
                        <button type="submit"
                            class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium font-inter rounded-3xl px-5 py-2.5 text-center bg-[#37654E] w-1/4 h-15 text-xl">
                            Login
                        </button>
                        <p class="text-sm text-black">
                            Don’t have account? <a href="/register"
                                class="font-bold text-primary-600 hover:underline text-[#37654E]">Sign Up</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
