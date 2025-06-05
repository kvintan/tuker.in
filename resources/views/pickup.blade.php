<x-layout>
    <div class="flex flex-col items-center justify-center">
        <h1 class="font-inter font-extrabold text-5xl">Pick Up</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 w-full gap-6 px-6 py-8 max-w-6xl">
            <!-- Form -->
            <div class="w-full">
                <form class="space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="name" class="block mb-2 font-semibold font-inter text-xl">Name</label>
                        <input type="name" name="name" id="name" class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="enter your name" required>
                    </div>
                    <div>
                        <label for="phoneNumber" class="block mb-2 font-semibold font-inter text-xl">Phone Number</label>
                        <input type="phoneNumber" name="phoneNumber" id="phoneNumber" class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter your phone number" required>
                    </div>
                    <div>
                        <label for="address" class="block mb-2 font-semibold font-inter text-xl">Address</label>
                        <input type="address" name="address" id="address" class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter your address" required>
                    </div>
                    <div>
                        <label for="rubbish" class="block mb-2 font-semibold font-inter text-xl">Rubbish Type</label>
                        <select name="rubbish" id="rubbish" class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                            <option value="" disabled selected>Choose your rubbish type</option>
                            <option value="plastic">Plastic</option>
                            <option value="paper">Paper</option>
                            <option value="metal">Metal</option>
                            <option value="organic">Organic</option>
                        </select>
                    </div>
                    <div>
                        <label for="weight" class="block mb-2 font-semibold font-inter text-xl">Weight</label>
                        <input type="weight" name="weight" id="weight" class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter your rubbish weight" required>
                    </div>
                    <div>
                        <label for="pickupDate" class="block mb-2 font-semibold font-inter text-xl">Pick Up Date</label>
                        <input type="date" name="pickupDate" id="pickupDate" class="bg-[#EFF5EB] border border-black text-black text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    </div>
                    <div class="flex flex-col gap-5 items-center justify-center py-10">
                        <h1 class="font-inter font-bold text-3xl">Total: Rp 19.000</h1>
                        <button type="submit" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium font-inter rounded-lg px-5 py-2.5 text-center bg-[#37654E] w-1/4 h-15 text-xl">Sign up</button>
                    </div>
                </form>
            </div>

            <!-- Gambar di kanan -->
            <div class="flex justify-center h-150 items-center">
                <img src="{{ asset('images/pickup.png') }}" alt="Pickup Image" class="w-100">
            </div>
        </div>
    </div>
</x-layout>