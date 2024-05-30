document.addEventListener('DOMContentLoaded', () => {
    const btnEditar = document.getElementById('btn-editar');
    const formEditarContainer = document.getElementById('form-editar-container');
    const btnCancelar = document.getElementById('btn-cancelar');
    const btnRetroceder = document.getElementById('btn-retroceder');

    btnEditar.addEventListener('click', () => {
        formEditarContainer.classList.remove('oculto');
    });

    btnCancelar.addEventListener('click', () => {
        formEditarContainer.classList.add('oculto');
    });

    const formEditar = document.getElementById('form-editar');
    formEditar.addEventListener('submit', (event) => {
        event.preventDefault();
        // Aquí puedes agregar el código para procesar el formulario y guardar cambios
        alert('Perfil actualizado correctamente');
        formEditarContainer.classList.add('oculto');
    });

    btnRetroceder.addEventListener('click', () => {
        window.history.back();
    });
});
