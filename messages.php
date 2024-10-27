<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            display: flex; 
            height: 100vh; 
        }
        .wrapper {
            display: flex; 
            flex-grow: 1; 
        }
        .nav {
            width: 200px; 
            background-color: #1e1e1e;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
        }
        .nav h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .nav ul {
            list-style-type: none;
            padding: 0;
        }
        .nav ul li {
            margin: 10px 0;
        }
        .nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        .nav ul li a:hover {
            text-decoration: underline;
        }
        .contacts {
            flex-basis: 200px; 
            background-color: #1e1e1e;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
            overflow-y: auto;
        }
        .contact {
            margin: 10px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .contact:hover {
            background-color: #444;
        }
        .container {
            flex-grow: 1; 
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center; 
        }
        .search-container {
            width: 100%; 
            margin-bottom: 20px;
        }
        .search-container input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #555;
            background-color: #222;
            color: #fff;
        }
        .chat-container {
            width: 100%; 
            max-width: 600px; 
            height: 400px; 
            overflow-y: auto; 
            background-color: #1e1e1e;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            position: relative; 
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .message.me {
            background-color: #007bff; 
            color: white;
            text-align: right;
        }
        .message.other {
            background-color: #444; 
            color: white;
            text-align: left;
        }
        .input-container {
            display: flex;
            width: 100%; 
            max-width: 600px; 
            align-items: center;
        }
        .input-container input[type="text"] {
            flex-grow: 1; 
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #555;
            background-color: #222;
            color: #fff;
            margin-right: 10px;
        }
        .input-container button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
        }
        .input-container button:hover {
            background-color: #0056b3;
        }
        .emoji-picker {
            position: absolute;
            display: none; 
            bottom: 70px; 
            left: 20px;
            background-color: #1e1e1e;
            border: 1px solid #555;
            border-radius: 5px;
            padding: 10px;
            z-index: 1000;
        }
        .emoji {
            cursor: pointer;
            padding: 5px;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <div class="nav">
            <h2>Menu</h2>
            <ul>
                <li><a href="feed.php">Home</a></li>
                <li><a href="#">Search</a></li>
                <li><a href="notifications.php">Notifications</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="communities.php">Communities</a></li>
                <li><a href="profiles.html">Profile</a></li>
                <li><a href="settings.html">Settings & Privacy</a></li>
            </ul>
        </div>

        <div class="contacts">
            <h2>Curret Chats</h2>
            <div class="contact" onclick="selectChat('Alice ')">Alice /Accounting</div>
            <div class="contact" onclick="selectChat('Bob')">Bob /C++</div>
            <div class="contact" onclick="selectChat('Charlie')">Charlie /Python</div>
            <div class="contact" onclick="selectChat('David')">David /Mobile Dev.</div>
            <div class="contact" onclick="selectChat('Emma')">Emma</div>
            <div class="contact" onclick="selectChat('Fiona')">Fiona </div>
        </div>

        <div class="container">
            <div class="search-container">
                <input type="text" id="search" placeholder="Start new chat with anyone...">
            </div>

            <div class="chat-container" id="chatContainer">
                <div class="message other">Hey, how are you?</div>
                <div class="message me">I'm good, thanks! How about you?</div>
                <div class="message other">Just working on a project.</div>
                <div class="message me">Sounds interesting!</div>
            </div>

            <div class="input-container">
                <input type="text" id="messageInput" placeholder="Type your message...">
                <button id="sendButton">Send</button>
                <input type="file" id="fileInput" accept="audio/*,image/*" style="display:none;">
                <button id="uploadButton">📎</button>
            </div>

            <div class="emoji-picker" id="emojiPicker">
                <span class="emoji" data-emoji="😊">😊</span>
                <span class="emoji" data-emoji="😂">😂</span>
                <span class="emoji" data-emoji="😍">😍</span>
                <span class="emoji" data-emoji="😢">😢</span>
                <span class="emoji" data-emoji="😡">😡</span>
            </div>
        </div>
    </div>

    <script>
        const chatContainer = document.getElementById('chatContainer');
        const messageInput = document.getElementById('messageInput');
        const sendButton = document.getElementById('sendButton');
        const fileInput = document.getElementById('fileInput');
        const uploadButton = document.getElementById('uploadButton');
        const emojiPicker = document.getElementById('emojiPicker');

        function displayMessage(content, isMe) {
            const message = document.createElement('div');
            message.className = `message ${isMe ? 'me' : 'other'}`;
            message.textContent = content;
            chatContainer.appendChild(message);
            chatContainer.scrollTop = chatContainer.scrollHeight; 
        }

        sendButton.addEventListener('click', () => {
            const messageText = messageInput.value.trim();
            if (messageText) {
                displayMessage(messageText, true); 
                messageInput.value = ''; 
            }
        });

        uploadButton.addEventListener('click', () => {
            fileInput.click(); 
        });

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    displayMessage(`File uploaded: ${file.name}`, true);
                }
                reader.readAsDataURL(file);
                fileInput.value = ''; 
            }
        });

        let emojiPickerVisible = false;
        uploadButton.addEventListener('click', () => {
            emojiPickerVisible = !emojiPickerVisible;
            emojiPicker.style.display = emojiPickerVisible ? 'block' : 'none';
        });

        emojiPicker.addEventListener('click', (event) => {
            if (event.target.classList.contains('emoji')) {
                const emoji = event.target.getAttribute('data-emoji');
                messageInput.value += emoji; 
                emojiPicker.style.display = 'none'; 
                emojiPickerVisible = false; 
            }
        });

        function selectChat(contactName) {
            chatContainer.innerHTML = '';
            setTimeout(() => {
                displayMessage(`Hi ${contactName}, how's it going?`, false);
                displayMessage(`Hey! I'm just catching up on some work.`, true);
            }, 500);
        }
    </script>
</body>
</html>
