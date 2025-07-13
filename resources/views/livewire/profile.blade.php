<div class="min-h-screen px-10 py-14">
    @if (session()->has('error'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
            class="mb-6 p-4 rounded-lg bg-red-100 text-red-800 border border-red-300 transition-all">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
            class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 border border-green-300 transition-all">
            {{ session('success') }}
        </div>
    @endif


    <div class="flex flex-col lg:flex-row gap-8">

        {{-- Sidebar --}}
        <div class="flex flex-col items-center gap-6 w-full lg:w-1/4">
            <div class="relative">
                @if ($profile_image)
                    <img src="{{ asset('storage/' . $profile_image) }}" alt="Profile Picture"
                        class="w-56 h-56 object-cover rounded-full shadow-md border-4 border-white">
                @else
                    <div
                        class="w-56 h-56 rounded-full bg-gray-200 flex items-center justify-center text-4xl text-gray-500 shadow-md border-4 border-white font-bold">
                        {{ strtoupper(substr($name, 0, 1)) }}
                    </div>
                @endif
            </div>

            <div class="w-full bg-white rounded-xl p-5 shadow space-y-4">
                <h2 class="text-base font-semibold">Hi, {{ $name }}!</h2>
                <hr>

                <div class="flex items-center gap-4">
                    <div class="bg-[#649B35] rounded-full w-12 h-12 p-2 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 13a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Wallet</p>
                        <p class="text-md font-bold">Rp{{ number_format(Auth::user()->balance, 0, ',', '.') }}</p>
                    </div>
                </div>

                <button wire:click="$set('showTopUpModal', true)"
                    class="w-full bg-[#37654E] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-[#2d523f] transition duration-150">
                    Top up
                </button>

                <hr>
                <a href="/history">
                    <div class="text-sm text-center text-gray-700 font-medium hover:underline cursor-pointer">
                        History
                    </div>
                </a>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="w-full lg:w-3/4">
            <div class="w-full bg-white p-8 rounded-xl shadow-md space-y-8">
                <h1 class="text-2xl font-bold text-gray-800">Profile</h1>

                @if ($isEditing)
                    <form wire:submit.prevent="save" class="space-y-4 text-base text-gray-700">
                        <div>
                            <label class="font-semibold block">Name</label>
                            <input type="text" wire:model.defer="name" class="w-full border rounded px-4 py-2">
                        </div>
                        <div>
                            <label class="font-semibold block">Phone</label>
                            <input type="text" wire:model.defer="phone_number"
                                class="w-full border rounded px-4 py-2">
                        </div>
                        <div>
                            <label class="font-semibold block">Address</label>
                            <textarea wire:model.defer="address" class="w-full border rounded px-4 py-2"></textarea>
                        </div>
                        <div>
                            <label class="font-semibold block">Upload Photo</label>
                            <input type="file" wire:model="new_profile_image">
                            @if ($new_profile_image)
                                <div class="mt-2">
                                    <img src="{{ $new_profile_image->temporaryUrl() }}" class="w-32 rounded">
                                </div>
                            @endif
                        </div>

                        <div class="flex gap-4">
                            <button type="submit"
                                class="bg-[#37654E] text-white px-6 py-2 rounded-lg hover:bg-[#2d523f]">Save</button>
                            <button type="button" wire:click="toggleEdit"
                                class="text-gray-500 underline">Cancel</button>
                        </div>
                    </form>
                @else
                    <div class="space-y-4 text-base text-gray-700">
                        <div class="flex">
                            <span class="w-32 font-semibold">Name</span>
                            <span>: {{ $name }}</span>
                        </div>
                        <div class="flex">
                            <span class="w-32 font-semibold">Email</span>
                            <span>: {{ $email }}</span>
                        </div>
                        <div class="flex">
                            <span class="w-32 font-semibold">Phone</span>
                            <span>: {{ $phone_number ?? '-' }}</span>
                        </div>
                        <div class="flex">
                            <span class="w-32 font-semibold">Address</span>
                            <span>: {{ $address ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="flex justify-start">
                        <button wire:click="toggleEdit"
                            class="bg-[#37654E] text-white px-6 py-2 text-sm font-medium rounded-lg hover:bg-[#2d523f] transition duration-150">
                            Edit Profile
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Top Up Modal --}}
    @if ($showTopUpModal)
        <div class="fixed inset-0 bg-black bg-opacity-40 z-40 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg space-y-4">
                <h2 class="text-xl font-semibold text-gray-800">Top Up Wallet</h2>

                <form wire:submit.prevent="redirectToStripe" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Amount (Rp)</label>
                        <input type="number" wire:model="top_up_amount" min="1000"
                            class="w-full mt-1 border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                    </div>

                    <div class="flex justify-end gap-2 pt-2">
                        <button type="submit"
                            class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition">Proceed</button>
                        <button type="button" wire:click="$set('showTopUpModal', false)"
                            class="text-gray-500 hover:underline">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

</div>

<script>
    window.addEventListener('redirect-to-stripe', event => {
        window.location.href = event.detail.url;
    });
</script>
