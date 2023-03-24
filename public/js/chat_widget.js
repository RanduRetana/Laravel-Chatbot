document.addEventListener("DOMContentLoaded", function () {
    const sendButton = document.querySelector(".send-button");
    const messageInput = document.querySelector(".message-input");
    const messages = document.querySelector(".messages");

    sendButton.addEventListener("click", function () {
        const message = messageInput.value.trim();
        if (message.length > 0) {
            const li = document.createElement("li");
            li.textContent = message;
            messages.appendChild(li);
            messageInput.value = "";

            // Enviar el mensaje al controlador de Laravel y procesar la respuesta
            fetch("/chat", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ user_message: message }),
            })
                .then((response) => response.json())
                .then((data) => {
                    const reply = data.bot_message;
                    setTimeout(function () {
                        const botLi = document.createElement("li");
                        botLi.textContent = reply;
                        botLi.style.color = "#4CAF50";
                        messages.appendChild(botLi);
                        messages.scrollTop = messages.scrollHeight;
                    }, 1000);
                });
        }
    });
    messageInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            sendButton.click();
        }
    });
});
