function validarRegistroTrabajador() {
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var ocupacion = document.getElementById('ocupacion').value;
    var email = document.getElementById('email').value;
    var DNI = document.getElementById('DNI').value;
    var telefono = document.getElementById('telefono').value;
    var password = document.getElementById('password').value;
    var confirmarPassword = document.getElementById('confirmar-password').value;
    var foto = document.getElementById('foto').value;

    var errorContainer = document.getElementById('errorContainer');
    errorContainer.innerHTML = ''; // Limpiar errores anteriores

    var errores = [];

    if (nombre.trim() === '') {
        errores.push('El campo Nombre es obligatorio.');
    }

    if (apellido.trim() === '') {
        errores.push('El campo Apellido es obligatorio.');
    }

    if(ocupacion.trim()===''){
        errores.push('El campo Ocupacion es Obligatorio');
    }

    if (email.trim() === '') {
        errores.push('El campo Email es obligatorio.');
    }

    if(DNI.trim()=== ''){
        errores.push('El campo DNI es Obligatorio');
    }

    if (telefono.trim() === '') {
        errores.push('El campo Teléfono es obligatorio.');
    }

    if (password.trim() === '') {
        errores.push('El campo Contraseña es obligatorio.');
    }

    if (confirmarPassword.trim() === '') {
        errores.push('El campo Confirmar Contraseña es obligatorio.');
    }

    if (password !== confirmarPassword) {
        errores.push('Las contraseñas no coinciden.');
    }

    if (errores.length > 0) {
        var errorHtml = '<ul>';
        errores.forEach(function(error) {
            errorHtml += '<li>' + error + '</li>';
        });
        errorHtml += '</ul>';
        errorContainer.innerHTML = errorHtml;
    } else {
        // Aquí puedes llamar a la función para registrar al trabajador si todos los campos son válidos
        alert('Trabajador registrado exitosamente');
        window.location.href = 'V_login.php'
    }
}