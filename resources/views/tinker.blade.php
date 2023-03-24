<!DOCTYPE html>
<html>
<head>
    <title>Chatbot</title>
    <script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0.9.0/dist/widget.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new BotManWidget({
                apiEndpoint: '/botman',
                chatServer: '/botman',
                title: 'Mi Chatbot',
            });
        });
    </script>
</head>
<body>
</body>
</html>