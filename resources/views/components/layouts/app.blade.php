<!DOCTYPE html>
<html lang="en" class="min-h-screen bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title ?? 'Tuker.in' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-gradient-to-tr from-green-300 via-white to-yellow-200
">
    @livewire('partials.navbar')
    <div class="flex flex-col min-h-screen">

        <!-- Konten Utama -->
        <main class="flex-grow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

    </div>
    @livewire('partials.footer')
    @livewireScripts
</body>

</html>
