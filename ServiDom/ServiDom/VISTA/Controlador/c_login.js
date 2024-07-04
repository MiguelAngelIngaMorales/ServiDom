function validarFormulario() {
    var email = document.getElementById("email").value;
    var contraseña = document.getElementById("contraseña").value;
    var errorDiv = document.getElementById("error");

    if (email === "" || contraseña === "") {
        errorDiv.innerText = "Por favor, completa todos los campos.";
        errorDiv.style.display = "block"; // Mostrar el mensaje de error
        return false; // Evitar que el formulario se envíe si falta rellenar alguna casilla
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "Modelo/m_login.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    window.location.href = "V_catalogo2.php";
                } else {
                    errorDiv.innerText = response.message;
                    errorDiv.style.display = "block"; // Mostrar el mensaje de error
                }
            }
        };
        xhr.send("email=" + encodeURIComponent(email) + "&contraseña=" + encodeURIComponent(contraseña));
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
