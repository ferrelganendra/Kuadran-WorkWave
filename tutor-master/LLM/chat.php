<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Groq API</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .chat-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1000;
        }
        .chat-container {
            display: none;
            position: fixed;
            bottom: 70px;
            right: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            overflow: hidden;
            z-index: 1000;
            flex-direction: column;
        }
        .chat-header {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 1.2em;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .chat-messages {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
            max-height: 300px;
            border-bottom: 1px solid #ddd;
        }
        .chat-message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            max-width: 80%;
            word-wrap: break-word;
        }
        .chat-message.user {
            background-color: #dcf8c6;
            align-self: flex-end;
            text-align: right;
        }
        .chat-message.assistant {
            background-color: #f1f0f0;
            align-self: flex-start;
            text-align: left;
        }
        .chat-footer {
            display: flex;
            border-top: 1px solid #ddd;
        }
        .chat-footer input {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
            font-size: 1em;
            border-bottom-left-radius: 10px;
        }
        .chat-footer button {
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 1em;
            border-bottom-right-radius: 10px;
        }
        .chat-footer button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <button class="chat-toggle" onclick="toggleChat()">Chat</button>
    <div class="chat-container" id="chat-container">
        <div class="chat-header">
            <h1>JobAssist Datang Membantu</h1>
        </div>
        <div id="chat-messages" class="chat-messages"></div>
        <div class="chat-footer">
            <input type="text" id="question" name="question" placeholder="Tuliskan pertanyaan anda" required>
            <button id="send-button">Kirim</button>
        </div>
    </div>

    <script>
        function toggleChat() {
            const chatContainer = document.getElementById('chat-container');
            if (chatContainer.style.display === 'none' || chatContainer.style.display === '') {
                chatContainer.style.display = 'flex';
            } else {
                chatContainer.style.display = 'none';
            }
        }

        document.getElementById('send-button').addEventListener('click', async function () {
            const question = document.getElementById('question').value;
            if (question.trim() === '') return;

            addMessage('user', question);
            document.getElementById('question').value = '';

            try {
                const response = await fetch('groq.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ question })
                });

                const data = await response.json();
                if (data.error) {
                    addMessage('assistant', 'Error: ' + data.error);
                } else if (Array.isArray(data.answer)) {
                    let answerText = '';
                    data.answer.forEach(answer => {
                        answerText += `Posisi: ${answer.posisi}, Lokasi: ${answer.lokasi_bekerja}, Syarat: ${answer.syarat_pekerjaan}\n`;
                    });
                    addMessage('assistant', answerText);
                } else {
                    addMessage('assistant', data.answer);
                }
            } catch (error) {
                console.error('Error:', error);
                addMessage('assistant', 'Terjadi kesalahan.');
            }
        });

        function addMessage(role, content) {
            const messageElement = document.createElement('div');
            messageElement.className = `chat-message ${role}`;
            messageElement.innerText = content;
            document.getElementById('chat-messages').appendChild(messageElement);
            document.getElementById('chat-messages').scrollTop = document.getElementById('chat-messages').scrollHeight;
        }
    </script>
</body>
</html>
