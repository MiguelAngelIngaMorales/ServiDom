<?php

// Datos de conexión a la base de datos
$server = "localhost";
$user = "root";
$pass = "";
$db = "ServiDom";

// Crear conexión
$conexion = new mysqli($server, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $email = $_POST['email'] ?? null;
    $dni = $_POST['DNI'] ?? null;
    $telefono = $_POST['telefono'] ?? null;
    $password = $_POST['password'] ?? null;
    $confirmarPassword = $_POST['confirmar-password'] ?? null;

    // Validar que las contraseñas coincidan
    if ($password !== $confirmarPassword) {
        die("Error: Las contraseñas no coinciden.");
    }

    // Encriptar la contraseña antes de guardarla
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Preparar la declaración SQL para insertar los datos
    $stmt = $conexion->prepare("INSERT INTO cliente (NOMBRE, APELLIDOS, EMAIL, DNI, TELEFONO, CONTRASENA) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre, $apellido, $email, $dni, $telefono, $passwordHash);

    // Ejecutar la declaración
    if ($stmt->execute()) {
        echo "<p>Registro exitoso</p>";
    } else {
        echo "<p>Error al registrar: " . $stmt->error . "</p>";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conexion->close();
} else {
    echo "<p>Método de solicitud no válido.</p>";
}
?>

