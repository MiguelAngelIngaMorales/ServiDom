/*Script para redirigir al usuario a la página de registro*/
function redirigirRegistro() {
    window.location.href = 'V_Registro.php';
}
function abrirPagina(url) {
    window.location.href = url;
}
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

        const nuevoAnuncio = document.createElement('div');
        nuevoAnuncio.classList.add('anuncio');
        nuevoAnuncio.innerHTML = `
            <h3>${titulo}</h3>
            <p>${descripcion}</p>
            <a href="V_login.php" class="solicitar-trabajo">Solicitar Trabajo</a>
        `;

        anuncioContainer.insertBefore(nuevoAnuncio, anuncioContainer.childNodes[2]);

        cerrarFormulario();
        document.getElementById('formularioAnuncio').reset();
    } else {
        alert('Por favor, complete todos los campos.');
    }
}