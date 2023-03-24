<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Widget</title>
    <link rel="stylesheet" href="{{ asset('css/chat_widget.css') }}">
    <script src="{{ asset('js/chat_widget.js') }}" defer></script>
</head>
<body>
    <div class="chat-widget">
        <div class="chat-header">
            <h4>Chatbot</h4>
        </div>
        <div class="chat-body">
            <ul class="messages"></ul>
        </div>
        <div class="chat-footer">
            <input type="text" class="message-input" placeholder="Escribe tu mensaje...">
            <button class="send-button">Enviar</button>
        </div>
    </div>
</body>
</html>