<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Find a Partner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        /* Chat messages container */
        #messages {
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            flex: 1; /* Ambil semua ruang kosong */
        }

        /* Styling pesan */
        .message {
            margin-bottom: 10px;
            max-width: 70%;
        }

        .message.user {
            align-self: flex-end;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 10px;
        }

        .message.bot {
            align-self: flex-start;
            background-color: #f1f1f1;
            color: black;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen flex">
    <!-- Main container -->
    <div class="bg-white w-full max-w-[1850px] h-screen rounded-xl shadow-lg flex flex-col overflow-hidden">
        
        <!-- Header -->
        <div class="bg-pink-200 flex items-center p-4 rounded-t-xl">
            <img alt="{{ strtoupper($mbti) }} avatar" class="rounded-full" height="40" src="{{ asset('img/MBTI/' . strtoupper($mbti) . '.png') }}" width="40"/>
            <div class="ml-4">
                <h1 class="text-lg font-bold">{{ strtoupper($mbti) }}</h1>
                <p class="text-sm">{{ $description }}</p>
            </div>
        </div>

        <!-- Chat Messages -->
        <div id="messages" class="p-4 overflow-y-auto">
            <div class="message user">
                <p>Partner found</p>
            </div>
        </div>

        <!-- Input Section -->
        <div class="bg-pink-200 p-4 flex items-center rounded-b-xl">
            
            <input id="messageInput" class="mr-4 flex-1 p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500" type="text" placeholder="Type a message"/>
            
            <i id="sendMessageBtn" class="fas fa-paper-plane text-xl text-gray-600 cursor-pointer"></i>
        </div>
    </div>


        <!-- Menu Section -->
        <div class="w-[350px] bg-white border-l border-gray-300 p-4 flex flex-col items-center">
            <button class="bg-white border border-gray-300 rounded-full px-4 py-2 mb-4 text-lg font-semibold">Menu</button>
            <div class="flex flex-col items-start w-full space-y-4">
                                           
                <button class="flex items-center w-full py-2">
                    <img src="{{ asset('img/Vector (1).png') }}" alt="Arrow" class="w-8 h-8 ml-4 mr-4">
                    <span>Skip</span>
                </button>
                <button  onclick="window.location.href='{{ route('dashboard.index') }}'"class="flex items-center w-full py-2">
                    <img src="{{ asset('img/Vector (2).png') }}" alt="Arrow" class="w-8 h-8 ml-4 mr-4">
                    <span>Add friend</span>
                </button>
                <button class="flex items-center w-full py-2">
                    <img src="{{ asset('img/lineicons_hand-stop.png') }}" alt="Arrow" class="w-8 h-8 ml-4 mr-4">
                    <span>Stop current dialog</span>
                </button>
                <button class="flex items-center w-full py-2">
                    <img src="{{ asset('img/Vector (3).png') }}" alt="Arrow" class="w-8 h-8 ml-4 mr-4">
                    <span>Block</span>
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.13.0/dist/echo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pusher-js@7.0.3/dist/web/pusher.min.js"></script>

    <script>
      // Simple Bot Response Function
      function getBotResponse(text) {
    text = text.toLowerCase();

    if (text.includes('hai') || text.includes('halo')) {
        return "Halo! Senang bisa ngobrol denganmu. Apa kabar?";
    } else if (text.includes('kamu suka apa')) {
        return "Aku suka sekali ngobrol dan belajar hal baru. Kamu suka apa?";
    } else if (text.includes('kabar ku baik,oiya apa hobi mu?')) {
         return "hobi aku sih suka coding, nonton film, dan main game. Kamu hobi apa? Mungkin kita bisa punya hobi yang sama!";
    } else if (text.includes('film')) {
        return "Aku suka banget nonton film action dan sci-fi. Tapi kadang-kadang juga suka film komedi. Kamu lebih suka genre apa?";
    } else if (text.includes('musik')) {
        return "Aku suka dengerin musik yang chill, terutama indie atau pop. Gimana dengan kamu? Ada genre favorit?";
    } else if (text.includes('makanan')) {
        return "Wah, aku doyan banget makan pizza! Tapi kalau lagi pengen makanan ringan, aku suka banget ngemil coklat. Kamu apa nih makanan favorit?";
    } else if (text.includes('halloween')) {
        return "Halloween ya? Seru banget! Punya kostum seram atau lucu untuk Halloween tahun ini?";
    } else if (text.includes('jalan-jalan')) {
        return "Aku suka banget jalan-jalan ke tempat-tempat baru! Terakhir kali ke Bali, seru banget. Kamu ada tempat favorit buat liburan?";
    } else if (text.includes('cinta')) {
        return "Cinta itu hal yang indah, ya. Kalau kamu, lebih suka hubungan yang santai atau serius?";
    } else if (text.includes('apa kabar')) {
        return "Aku baik-baik aja, terima kasih sudah nanya. Kamu gimana? Lagi sibuk apa akhir-akhir ini?";
    } else if (text.includes('bye') || text.includes('selamat tinggal')) {
        return "Oh, kamu mau pergi? Semoga hari kamu menyenankan ya! Sampai jumpa lagi!";
    } else if (text.includes('suka gaming')) {
        return "Wah, kamu juga gamer? Game apa yang lagi kamu mainin? Aku juga suka banget main game, apalagi yang bisa multiplayer!";
    } else {
        return "Hmm, kayaknya aku belum pernah dengar itu sebelumnya. Bisa ceritain lebih lanjut?";
    }
}

        // Function to add messages to the chat
        function addMessage(text, sender) {
            let messageContainer = document.getElementById("messages");
            let messageDiv = document.createElement("div");
            messageDiv.classList.add("message", sender);
            messageDiv.innerHTML = `<p>${text}</p>`;
            messageContainer.appendChild(messageDiv);
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }

        const sendButton = document.getElementById("sendMessageBtn");
        const input = document.getElementById("messageInput");

        sendButton.addEventListener("click", () => {
            const text = input.value.trim();
            if (text) {
                addMessage(text, "user");
                input.value = "";

                // Get bot response from the simple bot function
                const botResponse = getBotResponse(text);
                setTimeout(() => {
                    addMessage(botResponse, "bot");
                }, 500);
            }
        });

    </script>
</body>
</html>
