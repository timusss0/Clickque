<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash Screen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Menambahkan transisi untuk efek fade */
        .fade {
            transition: opacity 0.5s ease;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center h-screen bg-purple-300 text-white fade" id="splash-screen">
        <div class="text-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-80 mb-4">
            <h1 class="text-5xl font-bold text-black">Clickque</h1>
        </div>
    </div>

    <script>
        // Mengatur waktu tampilan splash screen
        setTimeout(() => {
            const splashScreen = document.getElementById('splash-screen');

            splashScreen.classList.add('opacity-0'); // Menambahkan efek fade out
            setTimeout(() => {
                splashScreen.style.display = 'none';
                // Mengarahkan ke halaman login
                window.location.href = '/login';
            }, 500); // Waktu yang sama dengan transisi
        }, 2000); // 2000 ms = 2 detik
    </script>
</body>
</html>