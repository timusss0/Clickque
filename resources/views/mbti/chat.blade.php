<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
</head>
<body class="bg-purple-200 h-screen flex items-center justify-center">
    <div class="bg-white w-full max-w-[1850px] h-[910px] rounded-xl shadow-lg flex"> <!-- Already using rounded-xl -->
        <!-- Chat Section -->
        <div class="flex-1 flex flex-col rounded-xl"> <!-- Added rounded-xl to the chat section -->
            <!-- Header -->
            <div class="bg-pink-200 flex items-center p-4 rounded-t-xl"> <!-- Rounded top corners -->
                <img alt="{{ strtoupper($mbti) }} avatar" class="rounded-full" height="40" src="{{ asset('img/MBTI/' . strtoupper($mbti) . '.png') }}" width="40"/>
                <div class="ml-4">
                    <h1 class="text-lg font-bold">{{ strtoupper($mbti) }}</h1>
                    <p class="text-sm">{{ $mbtiDescription }}</p>
                </div>
            </div>
            <!-- Chat Messages -->
            <div class="flex-1 p-4 overflow-y-auto">
                <div class="flex justify-start mb-4">
                
                </div>
            </div>
           <!-- Input Section -->
            <div class="bg-pink-200 p-4 flex items-center rounded-b-xl">
                <i class="fas fa-smile text-xl text-gray-600 mr-4"></i>
                <i class="fas fa-pen text-xl text-gray-600 mr-4"></i>
                <input id="messageInput" class="flex-1 p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500" type="text" placeholder="Type a message"/>
                <i class="fas fa-microphone text-xl text-gray-600 mx-4"></i>
                <i id="sendMessageBtn" class="fas fa-paper-plane text-xl text-gray-600 cursor-pointer"></i>
            </div>
        </div>
        <!-- Menu Section -->
        <div class="w-1/6 bg-white border-l border-gray-300 p-4 flex flex-col items-center">
            <button class="bg-white border border-gray-300 rounded-full px-4 py-2 mb-4 text-lg font-semibold">Menu</button>
            <div class="flex flex-col items-start w-full space-y-4">
                <button onclick="findPartner('{{ $mbti }}')" class="flex items-center w-full py-2">
                    <i class="fas fa-user-friends text-5xl text-gray-600 mr-4"></i>
                    <span>Find a partner</span>
                </button>
            
            
                <button class="flex items-center w-full py-2">
                    <i class="fas fa-forward text-5xl text-gray-600 mr-4"></i>
                    <span>Skip</span>
                </button>
                <button class="flex items-center w-full py-2">
                    <i class="fas fa-user-plus text-5xl text-gray-600 mr-4"></i>
                    <span>Add friend</span>
                </button>
                <button class="flex items-center w-full py-2">
                    <i class="fas fa-hand-paper text-5xl text-gray-600 mr-4"></i>
                    <span>Stop current dialog</span>
                </button>
                <button class="flex items-center w-full py-2">
                    <i class="fas fa-ban text-5xl text-gray-600 mr-4"></i>
                    <span>Block</span>
                </button>
            </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.13.0/dist/echo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pusher-js@7.0.3/dist/web/pusher.min.js"></script>

<script>
       window.Pusher = require('pusher-js');

const echo = new Echo({
    broadcaster: 'pusher',
    key: '{{ env('PUSHER_APP_KEY') }}',
    cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
    forceTLS: true
});

// Mendengarkan channel 'chat-channel' dan event 'MessageSent'
echo.channel('chat-channel')
    .listen('MessageSent', (event) => {
        console.log(event);
        // Tampilkan pesan baru di chat
        let messageContainer = document.getElementById('messages');
        messageContainer.innerHTML += `<p>${event.user}: ${event.message}</p>`;
    });


    function findPartner(mbti) {
        // Mengirim request ke backend untuk mencarikan pasangan
        fetch("{{ route('save-mbti') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                mbti_result: mbti
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Partner Found!");
            } else {
                alert("No partner found.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }

// Kirim pesan
document.getElementById('sendMessageBtn').addEventListener('click', function() {
    let message = document.getElementById('messageInput').value;

    if (message.trim()) {
        // Kirim pesan ke server menggunakan AJAX atau Fetch API
        fetch('{{ route('send.message') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                message: message
            })
        })
        .then(response => response.json())
        .then(data => {
            // Reset input field setelah pesan dikirim
            document.getElementById('messageInput').value = '';
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>

</body>
</html>
