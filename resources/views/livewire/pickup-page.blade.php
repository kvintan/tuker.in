<div class="flex flex-col items-center justify-center">
    <h1 class="font-inter font-extrabold text-5xl">Pick Up</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 w-full gap-6 px-6 py-8 max-w-6xl">
        <!-- Form -->
        <div class="w-full">
            <form class="space-y-4 md:space-y-6" wire:submit.prevent="submitForm">
                <div>
                    <label for="name" class="block mb-2 font-semibold font-inter text-xl">Name</label>
                    <input wire:model="name" type="text" id="name"
                        class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg block w-full p-2.5"
                        placeholder="Enter your name" required>
                </div>
                <div>
                    <label for="phoneNumber" class="block mb-2 font-semibold font-inter text-xl">Phone Number</label>
                    <input wire:model="phoneNumber" type="text" id="phoneNumber"
                        class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg block w-full p-2.5"
                        placeholder="Enter your phone number" required>
                </div>
                <div>
                    <label for="address" class="block mb-2 font-semibold font-inter text-xl">Address</label>
                    <input wire:model="address" type="text" id="address"
                        class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg block w-full p-2.5"
                        placeholder="Enter your address" required>
                </div>
                <div>
                    <label for="rubbish" class="block mb-2 font-semibold font-inter text-xl">Rubbish Type</label>
                    <select wire:model="rubbish" id="rubbish"
                        class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg block w-full p-2.5"
                        required>
                        <option value="" disabled>Choose your rubbish type</option>
                        <option value="plastic">Plastic</option>
                        <option value="paper">Paper</option>
                        <option value="metal">Metal</option>
                        <option value="elektronik">Elektronik</option>
                    </select>
                </div>
                <div>
                    <label for="weight" class="block mb-2 font-semibold font-inter text-xl">Weight (kg)</label>
                    <input wire:model="weight" type="number" min="0" id="weight"
                        class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg block w-full p-2.5"
                        placeholder="Enter your rubbish weight" required>
                </div>
                <div>
                    <label for="pickupDate" class="block mb-2 font-semibold font-inter text-xl">Pick Up Date</label>
                    <input wire:model="pickupDate" type="date" id="pickupDate"
                        class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg block w-full p-2.5"
                        required>
                </div>

                <div class="flex flex-col gap-5 items-center justify-center py-10">
                    <button type="submit"
                        class="text-white bg-primary-600 hover:bg-primary-700 font-medium font-inter rounded-lg px-5 py-2.5 text-center bg-[#37654E] w-1/4 h-15 text-xl">
                        Pickup
                    </button>
                </div>
            </form>
            @if ($showConfirmation)
                <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white rounded-lg p-6 shadow-xl w-[90%] max-w-md text-center">
                        <h2 class="text-2xl font-inter font-bold mb-4">Confirm Your Pickup</h2>
                        <p class="text-lg font-inter mb-4">Rubbish Type:
                            <strong>{{ ucfirst($rubbish) }}</strong>
                        </p>
                        <p class="text-lg font-inter mb-4">Weight: <strong>{{ $weight }} kg</strong></p>
                        <p class="text-lg font-inter mb-4">Total Price: <strong>Rp
                                {{ $this->formattedTotal }}</strong></p>
                        <p class="text-lg font-inter mb-6">Pickup Date: <strong>{{ $pickupDate }}</strong></p>

                        <div class="flex justify-center gap-4">
                            <button type="button" wire:click.prevent="$set('showConfirmation', false)"
                                class="bg-red-500 text-white px-4 py-2 rounded">
                                Cancel
                            </button>
                            <button type="button" wire:click="confirmFinal"
                                class="bg-green-600 text-white px-4 py-2 rounded">Confirm</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Image -->
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/pickup.png') }}" alt="Pickup Image" class="w-100 mt-[-30vh]">
        </div>
    </div>
</div>
