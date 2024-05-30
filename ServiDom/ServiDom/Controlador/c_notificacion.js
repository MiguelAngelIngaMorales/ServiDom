const socket = io();

document.getElementById('solicitar-trabajador').addEventListener('click', () => {
    fetch('/solicitar-trabajador')
        .then(response => response.json())
        .then(data => console.log(data.message))
        .catch(error => console.error('Error:', error));
});

socket.on('notificacion', (message) => {
    showNotification(message);
});

function showNotification(message) {
    const container = document.getElementById('notification-container');
    const notification = document.createElement('div');
    notification.classList.add('notification');
    notification.textContent = message;

    container.appendChild(notification);

    setTimeout(() => {
        notification.classList.add('fade-out');
        notification.addEventListener('transitionend', () => {
            notification.remove();
        });
    }, 3000); // La notificación se desvanecerá después de 3 segundos
}
