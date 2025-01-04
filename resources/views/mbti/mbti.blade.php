<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBTI Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
     
    </style>
</head>
<body class="bg-purple-300 flex items-center justify-center min-h-screen">
    <div class=" bg-white rounded-xl shadow-lg max-w-[1700px] mx-7 w-full p-7">
        <div class="flex flex-col items-center">
            <img
                src="{{ asset('img/MBTI.svg') }}"
                alt="MBTI Test"
                class="rounded-lg mb-10 max-w-3xl w-full"
            />
            <h1 class="text-4xl font-bold text-gray-800 text-center leading-snug">
                Get to know yourself better by taking the MBTI Test!
            </h1>
            <p class="text-xl text-gray-600 text-center mt-6 leading-relaxed">
                Discover your personality type and see how you can collaborate
                with others to create harmony like the picture above!
            </p>
            
            <div class="mt-5 flex justify-center space-x-4 mb-5">
                <a  href="https://www.animolife.id/tes-mbti" class="mt-5 bg-blue-300 text-black text-2xl font-semibold py-5 px-12 rounded-3xl shadow-lg hover:bg-blue-600 transition duration-300 flex items-center">
                 MBTI Test
                 <img src="{{ asset('img/arrow-right-solid.svg') }}" alt="Arrow" class="w-8 h-8 ml-4">
                </a>
                <a href="/mbti/input" class="mt-5 bg-blue-300 text-black text-2xl font-semibold py-5 px-12 rounded-3xl shadow-lg hover:bg-blue-600 transition duration-300 flex items-center">
                 Have you taken the MBTI test?
                 <img src="{{ asset('img/arrow-right-solid.svg') }}" alt="Arrow" class="w-8 h-8 ml-4">
                </a>
        </div>
    </div>
</body>
</html>
