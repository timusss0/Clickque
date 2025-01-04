{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-purple-200 h-screen flex items-center justify-center">

    <!-- Main container that holds both chat and menu sections -->
    <div class="bg-white w-full max-w-[1850px] h-50 rounded-xl shadow-lg flex overflow-hidden">

        <!-- Chat Section -->
        <div class="flex-1 flex flex-col rounded-xl">
            <!-- Header -->
            <div class="bg-pink-200 flex items-center p-4 rounded-t-xl">
                <img alt="{{ strtoupper($mbti) }} avatar" class="rounded-full" height="40" src="{{ asset('img/MBTI/' . strtoupper($mbti) . '.png') }}" width="40"/>
                <div class="ml-4">
                    <h1 class="text-lg font-bold">{{ strtoupper($mbti) }}</h1>
                    <p class="text-sm">{{ $description }}</p>
                </div>
            </div>

            <!-- Chat Messages -->
            <div class="flex-1 p-4 overflow-y-auto">
                <div class="flex justify-start mb-4">
                    <!-- Add messages here -->
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
        <div class="w-[350px] bg-white border-l border-gray-300 p-4 flex flex-col items-center">
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

        echo.channel('chat-channel')
            .listen('MessageSent', (event) => {
                console.log(event);
                let messageContainer = document.getElementById('messages');
                messageContainer.innerHTML += `<p>${event.user}: ${event.message}</p>`;
            });

        function findPartner(mbti) {
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
                    document.getElementById('messageInput').value = '';
                })
                .catch(error => console.error('Error:', error));
            }
        });
    </script>
</body>
</html> --}}
{{-- 
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Anonymus
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100 h-screen flex">
  <!-- Chat Area -->
  <div class="flex-1 flex flex-col">
   <div class="p-4 border-b border-gray-200 flex items-center justify-between">
    <div class="flex items-center">
     <img alt="Profile picture of the current chat user" class="w-10 h-10 rounded-full mr-3" height="40" src="https://storage.googleapis.com/a1aa/image/jh3c6cDfMw2LCCdB68eWlp0Fl1Inylfe1LozifHp59XpBrwfE.jpg" width="40"/>
     <div>
      <p class="font-semibold">
       Current User
      </p>
      <p class="text-sm text-gray-600">
       Online
      </p>
     </div>
    </div>
    <div>
     <button class="text-gray-600 hover:text-gray-800">
      <i class="fas fa-ellipsis-v">
      </i>
     </button>
    </div>
   </div>
   <div class="flex-1 overflow-y-auto p-4">
    <div class="flex mb-4">
     <img alt="Profile picture of the current chat user" class="w-10 h-10 rounded-full mr-3" height="40" src="https://storage.googleapis.com/a1aa/image/jh3c6cDfMw2LCCdB68eWlp0Fl1Inylfe1LozifHp59XpBrwfE.jpg" width="40"/>
     <div class="bg-gray-200 p-3 rounded-lg">
      <p class="text-sm">
       Hello! How are you?
      </p>
     </div>
    </div>
    <div class="flex mb-4 justify-end">
     <div class="bg-blue-500 text-white p-3 rounded-lg">
      <p class="text-sm">
       I'm good, thank you! How about you?
      </p>
     </div>
     <img alt="Profile picture of the current user" class="w-10 h-10 rounded-full ml-3" height="40" src="https://storage.googleapis.com/a1aa/image/eL9GtvKvCes6eprx44BeKns1h2pTpdGPrCNLNDDeMLl9ArwfE.jpg" width="40"/>
    </div>
    <div class="flex mb-4">
     <img alt="Profile picture of the current chat user" class="w-10 h-10 rounded-full mr-3" height="40" src="https://storage.googleapis.com/a1aa/image/jh3c6cDfMw2LCCdB68eWlp0Fl1Inylfe1LozifHp59XpBrwfE.jpg" width="40"/>
     <div class="bg-gray-200 p-3 rounded-lg">
      <p class="text-sm">
       I'm doing well, thanks for asking!
      </p>
     </div>
    </div>
   </div>
   <div class="p-4 border-t border-gray-200 flex items-center">
    <input class="flex-1 border border-gray-300 rounded-lg p-2 mr-2" placeholder="Type a message..." type="text"/>
    <button class="bg-blue-500 text-white p-2 rounded-lg">
     <i class="fas fa-paper-plane">
     </i>
    </button>
   </div>
  </div>
  <!-- Sidebar -->
  <div class="w-1/4 bg-white border-l border-gray-200 flex flex-col">
   <div class="p-4 border-b border-gray-200">
    <h1 class="text-xl font-bold">
     Chat App
    </h1>
   </div>
   <div class="flex-1 overflow-y-auto">
    <ul>
     <li class="p-4 border-b border-gray-200 flex items-center">
      <img alt="Profile picture of user 1" class="w-10 h-10 rounded-full mr-3" height="40" src="https://storage.googleapis.com/a1aa/image/AQDFsjBeRTW9UaCKvBlTOoZJIQ3pibiIAiRNfmXlkDRLYFenA.jpg" width="40"/>
      <div>
       <p class="font-semibold">
        User 1
       </p>
       <p class="text-sm text-gray-600">
        Last message...
       </p>
      </div>
     </li>
     <li class="p-4 border-b border-gray-200 flex items-center">
      <img alt="Profile picture of user 2" class="w-10 h-10 rounded-full mr-3" height="40" src="https://storage.googleapis.com/a1aa/image/VtRZUVBXqr5dG5yJs2FNHl8LtHOgqLO8hHfE7ZEE1rnCsCfTA.jpg" width="40"/>
      <div>
       <p class="font-semibold">
        User 2
       </p>
       <p class="text-sm text-gray-600">
        Last message...
       </p>
      </div>
     </li>
     <li class="p-4 border-b border-gray-200 flex items-center">
      <img alt="Profile picture of user 3" class="w-10 h-10 rounded-full mr-3" height="40" src="https://storage.googleapis.com/a1aa/image/P4N30Delwrx4TKPrE1oTwgztQryIQ2dRDTIOcL8UjybIsCfTA.jpg" width="40"/>
      <div>
       <p class="font-semibold">
        User 3
       </p>
       <p class="text-sm text-gray-600">
        Last message...
       </p>
      </div>
     </li>
     <li class="p-4 border-b border-gray-200 flex items-center">
      <img alt="Profile picture of user 4" class="w-10 h-10 rounded-full mr-3" height="40" src="https://storage.googleapis.com/a1aa/image/jX8csBkWeR3Tbym2Vzag7LGg56BMvoYqe3CXO1Jq8UTJYFenA.jpg" width="40"/>
      <div>
       <p class="font-semibold">
        User 4
       </p>
       <p class="text-sm text-gray-600">
        Last message...
       </p>
      </div>
     </li>
     <li class="p-4 border-b border-gray-200 flex items-center">
      <img alt="Profile picture of user 5" class="w-10 h-10 rounded-full mr-3" height="40" src="https://storage.googleapis.com/a1aa/image/FOxZLNK1cewwcKM3re1Cb7wAMC4GFgIGQIhlmjdjVRMPYFenA.jpg" width="40"/>
      <div>
       <p class="font-semibold">
        User 5
       </p>
       <p class="text-sm text-gray-600">
        Last message...
       </p>
      </div>
     </li>
    </ul>
   </div>
  </div>
 </body>
</html> --}}
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Anonymus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100 h-screen flex">
    <!-- Main container that holds both chat and menu sections -->
    <div class="bg-white w-full max-w-[1850px] h-50 rounded-xl shadow-lg flex overflow-hidden">

        <!-- Chat Section -->
        <div class="flex-1 flex flex-col rounded-xl">
            <!-- Header -->
            <div class="bg-pink-200 flex items-center p-4 rounded-t-xl">
                <img alt="{{ strtoupper($mbti) }} avatar" class="rounded-full" height="40" src="{{ asset('img/MBTI/' . strtoupper($mbti) . '.png') }}" width="40"/>
                <div class="ml-4">
                    <h1 class="text-lg font-bold">{{ strtoupper($mbti) }}</h1>
                    <p class="text-sm">{{ $description }}</p>
                </div>
            </div>
      
         <!-- Centered Instructions -->
         <div class="flex-1 p-4 flex mt-[59px] items-center justify-center text-center">
            <div class="bg-gray-200 p-6 rounded-lg shadow-md max-w-lg mx-auto">
                <p class="text-xl text-gray-700">
                    If you want to chat with this MBTI type, click "Find a Partner". <br>
                    If you don't want to chat with this MBTI, click "Skip". <br>
                    If you want to add this person as a friend, click "Add Friend". <br>
                    If you want to stop the current chat, click "Stop Current Dialog". <br>
                    If you don't like this person, click "Block".
                </p>
            </div>
        </div>
            <!-- Chat Messages -->
            <div class="flex justify-end mb-4 p-2 overflow-y-auto">
                <div class="text-white p-3 rounded-lg">
                    <p class="text-sm">
                        
                    </p>
                </div>
            </div>
            <div class="flex-1 p-4 overflow-y-auto">
                <div class="flex justify-start mb-4">
                    <!-- Example message -->
                   
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
        <div class="w-[350px] bg-white border-l border-gray-300 p-4 flex flex-col items-center">
            <button class="bg-white border border-gray-300 rounded-full px-4 py-2 mb-4 text-lg font-semibold">Menu</button>
            <div class="flex flex-col items-start w-full space-y-4">
                <button onclick="window.location.href='{{ route('partner.find', ['mbti' => $mbti]) }}'" class="flex items-center w-full py-2">
                    <img src="{{ asset('img/Vector.png') }}" alt="Arrow" class="w-8 h-8 ml-4 mr-4">
                    <span>Find a partner</span>
                </button>  
                <button onclick="submitPostRequest()" class="flex items-center w-full py-2">
                    <img src="{{ asset('img/Vector (1).png') }}" alt="Arrow" class="w-8 h-8 ml-4 mr-4">
                    <span>Skip</span>
                </button>
                    
                </form>
                <button class="flex items-center w-full py-2">
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

    <script>
        function submitPostRequest() {
            // Kirim POST request menggunakan fetch
            fetch("{{ route('save.mbti') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
            })
            .then(response => {
                if (response.ok) {
                    // Refresh halaman untuk memastikan navigasi selesai
                    window.location.reload();
                } else {
                    console.error("POST request failed");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    </script>
    
</body>
</html>
