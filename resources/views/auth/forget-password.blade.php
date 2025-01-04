<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-purple-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-4">Forgot Password</h2>
        <form action="{{ route('forgot-password') }}" method="POST">
            @csrf
            <label for="email" class="block text-gray-600 mb-2">Email</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500">
            <button type="submit" class="w-full bg-purple-500 text-white py-2 rounded-lg hover:bg-purple-600 mt-4">Send Reset Link</button>
        </form>
    </div>
</body>
</html>
