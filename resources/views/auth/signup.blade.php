<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Clickque</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-purple-100 min-h-screen flex">
    <!-- Bagian Kiri -->
    <div class="w-1/2 bg-purple-200 flex flex-col justify-center items-center p-10">
        <img src="{{ asset('img/LOGINNN.svg') }}" alt="Illustration" class="w-3/4">
        <h1 class="text-4xl font-bold text-gray-800 mt-6">Clickque</h1>
        <p class="text-gray-600 text-center mt-2">Connect Personalities, Create Friendships</p>
    </div>

    <!-- Bagian Kanan -->
    <div class="w-1/2 bg-white flex flex-col justify-center px-16 py-10">
        <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Sign Up</h2>
        <form action="{{ route('signup') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-gray-600 mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div>
                <label for="username" class="block text-gray-600 mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div>
                <label for="password" class="block text-gray-600 mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <button type="submit" class="w-full bg-purple-500 text-white py-3 rounded-lg hover:bg-purple-600">Sign Up</button>
        </form>
        <p class="text-center text-sm text-gray-500 mt-6">
            Already have an account? <a href="{{ route('login') }}" class="text-purple-500 hover:underline">Sign In</a>
        </p>
    </div>
</body>
</html>
