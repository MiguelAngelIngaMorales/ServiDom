function validarFormulario() {
    var email = document.getElementById("email").value;
    var contraseña = document.getElementById("contraseña").value;
    var errorDiv = document.getElementById("error");

    if (email === "") {
        errorDiv.innerText = "Por favor, ingresa tu correo electrónico.";
        errorDiv.style.display = "block"; // Mostrar el mensaje de error
        return false; // Evitar que el formulario se envíe si falta rellenar alguna casilla
    } else if (contraseña === "") {
        errorDiv.innerText = "Por favor, ingresa tu contraseña.";
        errorDiv.style.display = "block"; // Mostrar el mensaje de error
        return false; // Evitar que el formulario se envíe si falta rellenar alguna casilla
    } else {
        // Redirigir al catálogo si todos los campos están completos
        window.location.href = "V_catalogo2.html";
        return false; // Evitar que el formulario se envíe automáticamente
    }
}

function mostrarContraseña() {
    var contraseña = document.getElementById("contraseña");
    if (contraseña.type === "password") {
        contraseña.type = "text";
    } else {
        contraseña.type = "password";
    }
}
