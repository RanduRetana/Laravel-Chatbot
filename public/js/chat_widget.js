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
            // Aquí puedes enviar el mensaje al chatbot y procesar la respuesta.
            // Por ejemplo, puedes hacer una llamada AJAX a tu controlador de Laravel y procesar la respuesta.
            // En este ejemplo, simplemente mostramos la respuesta del chatbot como otro mensaje en la lista.
            const reply = "Respuesta del chatbot: " + message;
            setTimeout(function () {
                const botLi = document.createElement("li");
                botLi.textContent = reply;
                botLi.style.color = "#4CAF50";
                messages.appendChild(botLi);
                messages.scrollTop = messages.scrollHeight;
            }, 1000);
        }
    });
    messageInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            sendButton.click();
        }
    });
});
