// Función para retroceder a la página anterior
function goBack() {
    window.history.back();
}

// Función para agregar un nuevo mensaje al chat
function addMessage(message, isUser = true) {
    const chatBox = document.getElementById('chat-box');

    const messageContainer = document.createElement('div');
    messageContainer.classList.add('message');
    if (isUser) {
        messageContainer.classList.add('user-message');
    } else {
        messageContainer.classList.add('other-message');
    }

    const profilePic = document.createElement('img');
    profilePic.src = isUser ? 'imagen/perfil.png' : 'imagen/perfil-otro.png'; // Cambia las rutas según corresponda
    profilePic.alt = 'Foto de perfil';

    const messageContent = document.createElement('div');
    messageContent.classList.add('message-content');
    messageContent.textContent = message;

    messageContainer.appendChild(profilePic);
    messageContainer.appendChild(messageContent);

    chatBox.prepend(messageContainer); // Usar prepend para mantener la última conversación en la parte inferior

    // Desplazarse hacia abajo al agregar un nuevo mensaje
    chatBox.scrollTop = chatBox.scrollHeight;
}

// Evento para enviar el mensaje al hacer clic en el botón
document.getElementById('send-button').addEventListener('click', () => {
    const messageInput = document.getElementById('message-input');
    const message = messageInput.value.trim();

    if (message !== '') {
        addMessage(message);
        messageInput.value = '';
        // Simulación de respuesta del otro usuario
        setTimeout(() => {
            addMessage("Respuesta del otro usuario", false);
        }, 1000);
    }
});

// Evento para enviar el mensaje al presionar la tecla Enter
document.getElementById('message-input').addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        const message = e.target.value.trim();

        if (message !== '') {
            addMessage(message);
            e.target.value = '';
            // Simulación de respuesta del otro usuario
            setTimeout(() => {
                addMessage("Respuesta del otro usuario", false);
            }, 1000);
        }
    }
});
