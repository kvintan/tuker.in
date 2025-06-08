<x-layout>
    <div class="flex flex-col items-center">
        <!-- Bagian Atas -->
        <div class="mt-14 text-center max-w-4xl px-4">
            <h1 class="font-inter font-extrabold text-5xl">About Us</h1>
            <img src="{{ asset('images/logo.png') }}" alt="TUKER.IN Logo" class="mx-auto mt-[6vh] max-w-xs scale-[200%]">
            <p class="font-inter font-medium mt-[4vw] text-[1.2vw]">
                TUKER.IN is a platform that supports sustainable development by facilitating the recycling of waste
                through an e-commerce marketplace for recycled products. It encourages responsible consumption, offers
                waste pickup services, and fosters community involvement in the circular economy, creating new economic
                opportunities while reducing environmental impact.
            </p>
        </div>

        <!-- Bagian Tengah -->
        <div class="mt-[20vh] text-center">
            <h2 class="font-inter font-extrabold text-4xl">Meet Our Founder</h2>
            <h3 class="font-inter font-medium text-2xl mt-2">Kelompok 5 - PPTI 18</h3>
            <hr class="w-1/4 border-[#37654E] border-4 rounded-2xl mx-auto mt-4" />
        </div>

        <!-- card -->
        <div class="mt-10 w-full max-w-6xl flex flex-col gap-10">
            <!-- Card 1 -->
            <div class="grid grid-cols-3 gap-4 px-6 py-10 items-center rounded-xl">
                <!-- Gambar: 1 kolom -->
                <div class="col-span-1 flex justify-start">
                    <img src="{{ asset('images/chelsea.png') }}" class="max-w-full rounded-lg">
                </div>

                <!-- Deskripsi: 2 kolom -->
                <div class="col-span-2 flex flex-col items-start gap-2">
                    <h3 class="font-inter font-bold text-xl text-[#37654E]">2702363771</h3>
                    <h1 class="font-inter font-extrabold text-3xl">Chelsea Leawana</h1>
                    <p class="font-inter">
                        Chelsea Leawana is a passionate entrepreneur dedicated to driving sustainability through
                        innovation. With a keen focus on community empowerment and waste management, Chelsea founded
                        TUKER.IN to create a platform that promotes responsible consumption while contributing to a
                        cleaner environment.
                    </p>
                </div>
            </div>


            <!-- Card 2 -->
            <div class="grid grid-cols-3 gap-4 px-6 py-10 items-center rounded-xl">
                <!-- Deskripsi: 2 kolom -->
                <div class="col-span-2 flex flex-col items-start gap-2">
                    <h3 class="font-inter font-bold text-xl text-[#37654E]">2702363986</h3>
                    <h1 class="font-inter font-extrabold text-3xl">Kevin Tan</h1>
                    <p class="font-inter">
                        Kevin Tan is a passionate entrepreneur dedicated to driving sustainability through innovation.
                        With a keen focus on community empowerment and waste management, Kevin founded TUKER.IN to
                        create a platform that promotes responsible consumption while contributing to a cleaner
                        environment.
                    </p>
                </div>

                <!-- Gambar: 1 kolom -->
                <div class="col-span-1 flex justify-start">
                    <img src="{{ asset('images/cecep.png') }}" class="max-w-full rounded-lg">
                </div>
            </div>


            <!-- Card 3 -->
            <div class="grid grid-cols-3 gap-4 px-6 py-10 items-center rounded-xl">
                <!-- Gambar: 1 kolom -->
                <div class="col-span-1 flex justify-start">
                    <img src="{{ asset('images/pat.png') }}" class="max-w-full rounded-lg">
                </div>

                <!-- Deskripsi: 2 kolom -->
                <div class="col-span-2 flex flex-col items-start gap-2">
                    <h3 class="font-inter font-bold text-xl text-[#37654E]">2702364074</h3>
                    <h1 class="font-inter font-extrabold text-3xl">Patricia Mary N. M.</h1>
                    <p class="font-inter">
                        Patricia Mary is a passionate entrepreneur dedicated to driving sustainability through
                        innovation. With a keen focus on community empowerment and waste management, Patricia founded
                        TUKER.IN to create a platform that promotes responsible consumption while contributing to a
                        cleaner environment.
                    </p>
                </div>
            </div>


            <!-- Card 4 -->
            <div class="grid grid-cols-3 gap-4 px-6 py-10 items-center rounded-xl">
                <!-- Deskripsi: 2 kolom -->
                <div class="col-span-2 flex flex-col items-start gap-2">
                    <h3 class="font-inter font-bold text-xl text-[#37654E]">2702364080</h3>
                    <h1 class="font-inter font-extrabold text-3xl">Paundra Rangga Z.</h1>
                    <p class="font-inter">
                        Paundra Rangga is a passionate entrepreneur dedicated to driving sustainability through
                        innovation. With a keen focus on community empowerment and waste management, Paundra founded
                        TUKER.IN to create a platform that promotes responsible consumption while contributing to a
                        cleaner environment.
                    </p>
                </div>

                <!-- Gambar: 1 kolom -->
                <div class="col-span-1 flex justify-start">
                    <img src="{{ asset('images/paundra.png') }}" class="max-w-full rounded-lg">
                </div>
            </div>
        </div>
    </div>
</x-layout>
