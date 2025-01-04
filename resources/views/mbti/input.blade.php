<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input MBTI Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-purple-300 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-xl shadow-lg p-16 max-w-[1600px] w-full">
        <div class="flex justify-center mb-10">
            <img src="{{ asset('img/mbtii.svg') }}" alt="MBTI Test" class="rounded-lg max-w-7xl w-full" />
        </div>
        @if(session('success'))
    <div class="mb-4 p-4 text-green-700 bg-green-100 border border-green-400 rounded-lg">
        {{ session('success') }}
    </div>
@endif
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Enter your MBTI type and discover your unique personality!</h1>
        <form action="{{ route('save.mbti') }}" method="POST" class="space-y-6">
            @csrf
            <label for="mbti_type" class="block text-gray-600 mb-2">Select Your MBTI Type</label>
            <select id="mbti_type" name="mbti_type" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                <option value="ISTJ">ISTJ</option>
                <option value="ISFJ">ISFJ</option>
                <option value="INFJ">INFJ</option>
                <option value="INTJ">INTJ</option>
                <option value="ISTP">ISTP</option>
                <option value="ISFP">ISFP</option>
                <option value="INFP">INFP</option>
                <option value="INTP">INTP</option>
                <option value="ESTP">ESTP</option>
                <option value="ESFP">ESFP</option>
                <option value="ENFP">ENFP</option>
                <option value="ENTP">ENTP</option>
                <option value="ESTJ">ESTJ</option>
                <option value="ESFJ">ESFJ</option>
                <option value="ENFJ">ENFJ</option>
                <option value="ENTJ">ENTJ</option>
            </select>
            <button type="submit" class="w-full bg-purple-500 text-white py-3 rounded-lg hover:bg-purple-600">Save</button>
        </form>        
    </div>
</body>

</html>
