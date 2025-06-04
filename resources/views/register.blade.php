<x-layout>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-[#EFF5EC] rounded-lg shadow">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class=" text-center text-3xl font-bold leading-tight tracking-tight text-gray-900 md:text-2x">
                        Register
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="name" class="block mb-2 font-semibold font-inter text-xl">Name</label>
                            <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="enter your name" required="">
                        </div>
                        <div>
                            <label for="phoneNumber" class="block mb-2 font-semibold font-inter text-xl">Phone Number</label>
                            <input type="phoneNumber" name="phoneNumber" id="phoneNumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Enter your phone number" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 font-semibold font-inter text-xl">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Enter your email" required="">
                        </div>
                        <div>
                            <label for="address" class="block mb-2 font-semibold font-inter text-xl">Address</label>
                            <input type="address" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Enter your address" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 font-semibold font-inter text-xl">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                        </div>
                        <div class="flex flex-col gap-5 items-center justify-center">
                            <button type="submit" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium font-inter rounded-lg px-5 py-2.5 text-center bg-[#37654E] w-1/4 h-15 text-xl">Sign up</button>
                            <p class="text-sm font-light text-black">
                                Already have an account? <a href="#" class="font-medium text-primary-600 hover:underline ">Login here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-layout>