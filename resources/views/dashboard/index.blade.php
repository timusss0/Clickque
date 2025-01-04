@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="w-1/4 bg-gray-100 p-6 rounded-l-lg">
@include('layouts.sidebar')

<!-- Main Content -->
<div class="flex flex-col items-center justify-center w-full" id="default-content">
   <img src="{{ asset('img/logo.png') }}" alt="Arrow" class="w-40 h-40 ml-4 mr-4">
   <h2 class="text-2xl font-bold mb-2">
     Clickque
   </h2>
   <p class="text-center text-gray-600">
     Join the ultimate platform to ignite innovation &amp; faster meaningful collaborations
   </p>
</div>

<!-- Chat Content -->
<div id="chat-content" class="hidden w-full h-[800px] bg-gray-50">
   <div class="flex flex-col h-full w-full">
      <div class="flex items-center bg-purple-200 p-4">
         <img src="https://storage.googleapis.com/a1aa/image/1kpa0qGdc9JSJleQndMrtB8THYLhVDNssx6iZkIqSffSJ88nA.jpg" alt="User Avatar" class="rounded-full w-10 h-10 mr-4">
         <h3 class="text-lg font-bold">{{ $mbti }}</h3>
      </div>
      <div class="flex-1 bg-gray-100 p-4 overflow-y-auto" id="messages">
         <!-- Chat messages will appear here -->
         <div class="message-bot">
            <p></p>
         </div>
      </div>
      <div class="flex p-2 bg-purple-200 border-t">
         <input id="messageInput" type="text" class="flex-1 p-2 border border-gray-300 rounded-l-lg" placeholder="Type a message...">
         <button id="sendMessageBtn" class="bg-blue-500 text-white px-4 py-2 rounded-r-lg">Send</button>
      </div>
   </div>
</div>

<!-- Right Sidebar -->
<div class="w-1/4 bg-gray-100 p-6 rounded-r-lg">
   <div class="flex items-center mb-6">
      <img alt="User Avatar" class="rounded-full mr-3" height="40" src="{{ asset('img/p.png') }}" width="40"/>
      <div>
         <h3 class="text-lg font-bold">
           {{ Auth::user()->username }}
         </h3>
         <p class="text-sm text-gray-500">
           Available
         </p>
      </div>
   </div>
   <h4 class="text-lg font-bold mb-4">
       Messages
   </h4>
   <div class="relative mb-4">
      <input class="w-full p-2 rounded-lg bg-white border border-gray-300" placeholder="Search" type="text" />
      <i class="fas fa-search absolute right-3 top-3 text-gray-500"></i>
   </div>
   <div class="flex items-center cursor-pointer" id="open-chat">
      <img alt="User Avatar" class="rounded-full mr-3" height="40" src="https://storage.googleapis.com/a1aa/image/1kpa0qGdc9JSJleQndMrtB8THYLhVDNssx6iZkIqSffSJ88nA.jpg" width="40" />
      <div>
         <h3 class="text-lg font-bold">
           {{ $mbti }}
         </h3>
         <p class="text-sm text-gray-500">
           Tap to chat
         </p>
      </div>
   </div>
</div>

<script>
   // Show the chat content when the "Tap to chat" button is clicked
   document.getElementById('open-chat').addEventListener('click', function () {
      document.getElementById('default-content').style.display = 'none';
      document.getElementById('chat-content').style.display = 'block';
   });

   // Simple Bot Response Function
   function getBotResponse(text) {
    text = text.toLowerCase();

    if (text.includes('hai') || text.includes('halo')) {
        return "Halo! Senang bisa ngobrol denganmu. Lagi sibuk apa hari ini? Atau mungkin ada cerita seru yang ingin kamu bagikan?";
    } else if (text.includes('kamu suka apa')) {
        return "Aku suka banget ngobrol dan belajar dari orang-orang. Kalau kamu, biasanya ngisi waktu luang dengan apa?";
    } else if (text.includes('cinta')) {
        return "Cinta itu indah tapi juga penuh tantangan. Menurutmu, apa yang paling penting dalam sebuah hubungan?";
    } else if (text.includes('makan apa')) {
        return "Kalau aku sih suka yang simpel seperti nasi goreng. Kamu suka makanan tradisional atau lebih suka mencoba makanan baru?";
    } else if (text.includes('hobi')) {
        return "Hobi aku mendengar cerita dan membantu orang. Kamu punya hobi seru yang ingin diceritain?";
    } else if (text.includes('pekerjaan') || text.includes('kerja apa')) {
        return "Aku sebenarnya nggak kerja, tapi aku suka menemani orang ngobrol. Kalau kamu, apa yang paling kamu nikmati dari pekerjaanmu?";
    } else if (text.includes('capek')) {
        return "Capek itu wajar kok. Kadang, istirahat sejenak bisa bantu banget. Kalau lagi capek, kamu biasanya ngapain buat recharge energi?";
    } else if (text.includes('sedih')) {
        return "Sedih itu bagian dari hidup, tapi nggak apa-apa kok. Kadang cerita ke seseorang bisa bikin lega. Kamu mau cerita?";
    } else if (text.includes('film') || text.includes('nonton')) {
        return "Aku nggak bisa nonton film, tapi aku suka dengar cerita tentang film favorit orang. Genre film apa yang paling kamu suka?";
    } else if (text.includes('musik') || text.includes('lagu')) {
        return "Musik itu keren, ya? Kadang bikin kita lebih semangat atau malah bikin santai. Kamu punya lagu favorit yang sering kamu putar akhir-akhir ini?";
    } else if (text.includes('liburan')) {
        return "Liburan itu penting buat menyegarkan pikiran. Kalau liburan impian kamu, destinasi seperti apa yang kamu bayangkan?";
    } else if (text.includes('teman')) {
        return "Punya teman itu menyenangkan. Menurutmu, apa yang bikin pertemanan jadi awet?";
    } else if (text.includes('belajar')) {
        return "Belajar memang bikin kita terus berkembang. Kamu lagi belajar sesuatu yang seru nggak? Mungkin aku bisa bantu!";
    } else if (text.includes('iklas')) {
         return "sabar ya... mungkin ini yang terbaik untuk saat ini...";    
    } else if (text.includes('bosan')) {
        return "Kalau bosan, kadang mencoba sesuatu yang baru bisa bantu. Ada ide kegiatan yang pengen kamu coba belakangan ini?";
    } else if (text.includes('kenangan')) {
        return "Kenangan itu berharga, ya. Ada satu kenangan indah yang selalu bikin kamu tersenyum kalau diingat?";
    } else if (text.includes('keluarga')) {
        return "Keluarga adalah tempat kita pulang. Apa momen terbaikmu bersama keluarga?";
    } else if (text.includes('motivasi')) {
        return "Kadang kita butuh motivasi lebih, ya. Apa yang biasanya bikin kamu kembali semangat kalau lagi down?";
    } else if (text.includes('cuaca')) {
        return "Cuaca hari ini gimana di tempatmu? Lebih suka hujan yang adem atau cerah yang hangat?";
    } else {
        return "Hmm, itu menarik banget! Bisa ceritain lebih banyak? Aku pengen tahu lebih dalam.";
    }
}

   // Function to add messages to the chat
   function addMessage(text, sender) {
   const messageContainer = document.getElementById("messages");
   const messageWrapper = document.createElement("div"); // Wrapper for alignment
   const messageDiv = document.createElement("div");

   if (sender === "user") {
      messageWrapper.classList.add("flex", "justify-end");
      messageDiv.classList.add(
         "bg-blue-500",
         "text-white",
         "p-3",
         "rounded-lg",
         "rounded-br-none",
         "max-w-xs"
      );
   } else {
      messageWrapper.classList.add("flex", "justify-start");
      messageDiv.classList.add(
         "bg-gray-200",
         "text-gray-800",
         "p-3",
         "rounded-lg",
         "rounded-bl-none",
         "max-w-xs"
      );
   }

   messageDiv.classList.add("w-fit", "my-1");
   messageDiv.innerHTML = `<p>${text}</p>`;
   messageWrapper.appendChild(messageDiv);
   messageContainer.appendChild(messageWrapper);
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

@endsection
