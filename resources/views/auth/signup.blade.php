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
        @if(session('success'))
        <div class="mb-4 p-4 text-green-700 bg-green-100 border border-green-400 rounded-lg">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="mb-4 p-4 text-red-700 bg-red-100 border border-red-400 rounded-lg">
            {{ session('error') }}
        </div>
    @endif
    
    @if($errors->any())
        <div class="mb-4 p-4 text-red-700 bg-red-100 border border-red-400 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Sign Up</h2>
        <form action="{{ route('signup') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="username" class="block text-gray-600 mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            </div>
            <div>
                <label for="email" class="block text-gray-600 mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            </div>
            <div>
                <label for="phone_number" class="block text-gray-600 mb-2">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div>
                <label for="birth_date" class="block text-gray-600 mb-2">Date of Birth</label>
                <input type="date" id="birth_date" name="birth_date" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div>
                <label for="password" class="block text-gray-600 mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            </div>
            <button type="submit" class="w-full bg-purple-500 text-white py-3 rounded-lg hover:bg-purple-600">Sign Up</button>
        </form>
        <p class="text-center text-sm text-gray-500 mt-6">
            Already have an account? <a href="{{ route('login') }}" class="text-purple-500 hover:underline">Sign In</a>
        </p>
    </div>
    
</body>
</html>
