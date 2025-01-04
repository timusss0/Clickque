<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBTI Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-purple-300 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-xl shadow-lg p-[80px] max-w-[1700px] w-full">
        <!-- Judul -->
        <h1 class="text-4xl lg:text-5xl font-bold mt-2 text-center">Personalities That Match You</h1>
        
        <!-- Gambar MBTI -->
        <div class="flex justify-center my-10">
            @php
                $imagePath = asset('img/MBTI/' . $mbtiResult . '.png');
            @endphp
            <img src="{{ $imagePath }}" alt="{{ $mbtiResult }} MBTI" class="rounded-lg max-w-[200px] h-auto" />
        </div>

        <!-- Nama MBTI -->
        <h1 class="text-5xl lg:text-4xl font-semibold text-center mb-8">Your MBTI Result: {{ $mbtiResult }}</h1>
        <p class="text-lg text-center mb-6">Here are the personalities that are suitable to be friends with you :</p>
        
     
        <!-- Daftar Kecocokan (List of Compatible MBTI Types) -->
        <div class="flex justify-center space-x-4">
            @foreach ($compatibles as $compatible)
                <!-- Each MBTI type is a clickable box that redirects to the chat page for that type -->
                <a href="{{ route('mbti.anonymous', ['mbti' => $compatible]) }}" class="flex items-center bg-blue-100 p-4 rounded-3xl shadow-xl cursor-pointer hover:bg-blue-200 min-w-[300px]">
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold text-center">{{ $compatible }}</h3>
                        <p class="text-gray-700 text-center">
                            {{ $compatiblesWithDescriptions[$compatible] ?? 'Description not available.' }}
                        </p>
                    </div>
                    <img src="{{ asset('img/arrow-right-solid.svg') }}" alt="Arrow" class="w-8 h-8 ml-4">
                </a>
            @endforeach
        </div>
        

    </div>
</body>
</html>
