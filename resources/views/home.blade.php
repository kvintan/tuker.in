<x-layout>
    <div class="flex flex-col md:flex-row items-center justify-between px-6 py-16 max-w-7xl mx-auto">
        <!-- Text Content -->
        <div class="md:w-1/2 mb-10 md:mb-0">
            <h1 class="font-inter font-extrabold text-4xl md:text-6xl leading-tight mb-6">
                Pick Up Trash,<br> the Smart Way
            </h1>
            <p class="font-inter text-gray-700 mb-6">
                tuker.in offers innovative solutions to make waste disposal and recycling efficient, while helping you contribute to a cleaner planet
            </p>
            <a href="/product">
                <div class="flex bg-[#37654E] w-36 md:w-40 items-center justify-center hover:bg-[#2a4b3a] text-white font-bold font-inter py-3 px-8 rounded-full transition duration-200 cursor-pointer">
                    Explore
                </div>
            </a>
        </div>

        <!-- Image Content -->
        <div class="md:w-1/2 flex justify-center">
            <div class="">
                <img src="{{ asset('images/home.png') }}" alt="Trash Bin" class="w-full h-full object-cover">
            </div>
        </div>
    </div>

    <!-- bagian mid -->
    <div class="flex flex-col items-center justify-center px-6 py-16 max-w-7xl mx-auto text-center gap-6">
        <h1 class="font-inter font-extrabold text-5xl">What we offers?</h1>
        <p class="font-inter text-xl max-w-3xl">
            We provide smart and eco-friendly waste collection solutions, making it easier for individuals and businesses to manage and recycle waste effectively
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12 w-full h-80">
            <!-- card 1 -->
            <div class="flex flex-col items-center bg-[#376551] rounded-2xl p-8 h-full shadow-md hover:scale-105 transition-transform duration-300">
                <div class="bg-white rounded-full p-4 mb-4">
                    <img src="{{ asset('images/home1.png') }}" alt="Pickup" class="w-12 h-12">
                </div>
                <h2 class="font-inter font-extrabold text-2xl text-white mb-2">Pickup</h2>
                <p class="text-white font-inter font-light">
                    Easily schedule waste pickups for recycling, making it convenient to dispose of and repurpose your recyclable materials.
                </p>
            </div>

            <!-- card 2 -->
            <div class="flex flex-col items-center bg-[#376551] rounded-2xl p-8 h-full shadow-md hover:scale-105 transition-transform duration-300">
                <div class="bg-white rounded-full p-4 mb-4">
                    <img src="{{ asset('images/home2.png') }}" alt="E-commerce" class="w-12 h-12">
                </div>
                <h2 class="font-inter font-extrabold text-2xl text-white mb-2">E-commerce</h2>
                <p class="text-white font-inter font-light">
                    Browse and purchase eco-friendly products made from recycled materials, supporting sustainable consumption and production.
                </p>
            </div>

            <!-- card 3 -->
            <div class="flex flex-col items-center bg-[#376551] rounded-2xl p-8 h-full shadow-md hover:scale-105 transition-transform duration-300">
                <div class="bg-white rounded-full p-4 mb-4">
                    <img src="{{ asset('images/home3.png') }}" alt="Auction" class="w-12 h-12">
                </div>
                <h2 class="font-inter font-extrabold text-2xl text-white mb-2">Auction</h2>
                <p class="text-white font-inter font-light">
                    Participate in exciting auctions for recycled goods and waste management services, contributing to a circular economy.
                </p>
            </div>
        </div>
    </div>

    <!-- bagian time -->
    <div class="flex flex-col items-center justify-center px-6 py-16 max-w-7xl mx-auto text-center gap-6">
        <!-- Judul -->
        <h1 class="font-inter font-extrabold text-4xl md:text-5xl">What are you waiting for?</h1>

        <!-- Timer -->
        <div class="grid grid-cols-3 gap-6 mt-4">
            <!-- Hours -->
            <div class="flex flex-col items-center gap-2">
                <div class="bg-[#A7DE89] w-72 h-72 rounded-xl border border-black flex items-center justify-center">
                    <span id="hours" class="text-9xl font-bold text-[#1A4935]">00</span>
                </div>
                <span class="text-black font-semibold text-4xl">Hours</span>
            </div>
            <!-- Minutes -->
            <div class="flex flex-col items-center gap-2">
                <div class="bg-[#A7DE89] w-72 h-72 rounded-xl border border-black flex items-center justify-center">
                    <span id="minutes" class="text-9xl font-bold text-[#1A4935]">00</span>
                </div>
                <span class="text-black font-semibold text-4xl">Mins</span>
            </div>
            <!-- Seconds -->
            <div class="flex flex-col items-center gap-2">
                <div class="bg-[#A7DE89] w-72 h-72 rounded-xl border border-black flex items-center justify-center">
                    <span id="seconds" class="text-9xl font-bold text-[#1A4935]">00</span>
                </div>
                <span class="text-black font-semibold text-4xl">Secs</span>
            </div>
        </div>

        <!-- Tombol -->
        <a href="#" class="mt-8">
            <div class="bg-[#37654E] hover:bg-[#2b4a3a] text-white font-semibold font-inter px-8 py-3 rounded-full transition duration-300">
                See Auction
            </div>
        </a>
    </div>

    <!-- testimonial -->
    <div class="flex flex-col items-center justify-center px-6 py-16 max-w-7xl mx-auto text-center gap-6">
        <!-- Judul -->
        <h1 class="font-inter font-extrabold text-4xl md:text-5xl">Testimonials</h1>
        <div class="flex flex-col md:flex-row items-center justify-center gap-8 mt-8 w-full">
            <div class="bg-[#37654E] rounded-2xl p-6 shadow-md w-full h-80 flex flex-col md:flex-row items-center gap-6">
                <img src="{{ asset('images/chelsea.png') }}" alt="Chelsea Leawana" class="w-48 h-48 rounded-full object-cover" />
                <div class="text-center md:text-left">
                    <h1 class="font-inter font-bold text-3xl text-white">Chelsea Leawana</h1>
                    <p class="text-white font-inter text-lg mt-2">
                        Using TUKER.IN has been a game-changer for me! It's an innovative platform that not only helps me recycle efficiently but also allows me to earn from my waste, making a positive impact on both the environment and my wallet.
                    </p>
                    <img src="{{ asset('images/star.png') }}" alt="Rating" class="mt-4 mx-auto md:mx-0" />
                </div>
            </div>
        </div>
    </div>


</x-layout>
<script>
    // Set target waktu auction (misalnya: besok jam 12 siang)
    const deadline = new Date();
    deadline.setDate(deadline.getDate() + 1); // besok
    deadline.setHours(12, 0, 0, 0); // jam 12:00:00 siang

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = deadline - now;

        if (distance < 0) {
            document.getElementById("hours").textContent = "00";
            document.getElementById("minutes").textContent = "00";
            document.getElementById("seconds").textContent = "00";
            return;
        }

        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("hours").textContent = String(hours).padStart(2, "0");
        document.getElementById("minutes").textContent = String(minutes).padStart(2, "0");
        document.getElementById("seconds").textContent = String(seconds).padStart(2, "0");
    }

    // Jalankan pertama kali
    updateCountdown();

    // Update setiap detik
    setInterval(updateCountdown, 1000);
</script>