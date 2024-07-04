/*Script para redirigir al usuario a la página de registro*/
function redirigirRegistro() {
    window.location.href = 'V_perfilPersonal.php';
}
function abrirPagina(url) {
    window.location.href = url;
}

// Simulación de usuarios y anuncios
let usuarios = [
    { id: 1, nombre: 'Usuario Ejemplo', correo: 'usuario.ejemplo@example.com' }
];

let anuncios = [];

function mostrarFormulario() {
    document.getElementById('formularioModal').style.display = 'block';
}

function cerrarFormulario() {
    document.getElementById('formularioModal').style.display = 'none';
}

function agregarAnuncio() {
    const titulo = document.getElementById('titulo').value;
    const descripcion = document.getElementById('descripcion').value;

    if (titulo && descripcion) {
        const anuncioContainer = document.querySelector('.anuncios-container');

        const nuevoAnuncio = {
            id: anuncios.length + 1,
            titulo: titulo,
            descripcion: descripcion,
            solicitudes: []
        };

        anuncios.push(nuevoAnuncio);

        const nuevoAnuncioHTML = document.createElement('div');
        nuevoAnuncioHTML.classList.add('anuncio');
        nuevoAnuncioHTML.innerHTML = `
            <h3>${titulo}</h3>
            <p>${descripcion}</p>
            <a href="#" class="solicitar-trabajo" data-id="${nuevoAnuncio.id}" onclick="enviarSolicitud(${nuevoAnuncio.id})">Solicitar Trabajo</a>
        `;

        anuncioContainer.insertBefore(nuevoAnuncioHTML, anuncioContainer.childNodes[2]);

        cerrarFormulario();
        document.getElementById('formularioAnuncio').reset();
    } else {
        alert('Por favor, complete todos los campos.');
    }
}

function enviarSolicitud(idAnuncio) {
    const usuario = usuarios[0]; // Simulación de usuario actual (podría ser dinámico en una aplicación real)
    const anuncio = anuncios.find(a => a.id === idAnuncio);

    if (anuncio) {
        // Agregar la solicitud al anuncio
        anuncio.solicitudes.push(usuario);

        // Cambiar el texto del botón y desactivarlo
        const boton = document.querySelector(`.solicitar-trabajo[data-id="${idAnuncio}"]`);
        if (boton) {
            boton.textContent = 'Solicitud Enviada';
            boton.className = 'solicitud-enviada';
            boton.removeAttribute('onclick');
            boton.setAttribute('disabled', true);

            // Enviar notificación por correo electrónico al usuario que publicó el anuncio
            enviarCorreoNotificacion(anuncio, usuario);
        }
    }
}

function enviarCorreoNotificacion(anuncio, usuario) {
    // Aquí simularíamos el envío de un correo electrónico
    const correoDestino = 'casillamanuel226@gmail.com'; // Correo del usuario que publicó el anuncio (en una app real, esto se obtendría de la base de datos)
    const asunto = `Nuevo solicitud para tu anuncio "${anuncio.titulo}"`;
    const mensaje = `Hola,\n\nTu anuncio "${anuncio.titulo}" ha recibido una solicitud de trabajo de ${usuario.nombre}.`;

    console.log(`Enviando correo a ${correoDestino}:\n\n${mensaje}`);
}

document.addEventListener("DOMContentLoaded", function () {
    var perfilIcon = document.getElementById("perfil");
    var dropdown = document.getElementById("dropdown");
    var perfilContainer = document.querySelector(".perfil-container");

    perfilIcon.addEventListener("click", function (event) {
        event.stopPropagation();
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
            perfilContainer.classList.remove("open");
        } else {
            dropdown.style.display = "block";
            perfilContainer.classList.add("open");
        }
    });

    document.addEventListener("click", function (event) {
        if (!perfilIcon.contains(event.target)) {
            dropdown.style.display = "none";
            perfilContainer.classList.remove("open");
        }
    });
});