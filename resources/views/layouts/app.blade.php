<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clickque</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
          .message.user {
            align-self: flex-end;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 10px;
        }

        .message-bot {
            align-self: flex-start;
            background-color: #f1f1f1;
            color: black;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-purple-300 h-screen flex items-center justify-center">
    <div class="bg-white w-full max-w-[1700px] h-[800px] rounded-lg shadow-lg flex">
        @yield('content')
    </div>
</body>
</html>