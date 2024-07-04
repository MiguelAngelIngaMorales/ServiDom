<?php
// Incluir la conexión a la base de datos
$server = "localhost";
$user = "root";
$pass = "";
$db = "servidom";

// Crear conexión
$conexion = new mysqli($server, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
} else {
    echo "Conectado exitosamente";
}

// Verificar si los datos han sido enviados por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellido']; // Ajustado según la definición del procedimiento almacenado
    $email = $_POST['email'];
    $dni = $_POST['dni']; // Ajustado según la definición del procedimiento almacenado
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];
    $confirmar_password = $_POST['confirmar-password'];

    // Validar que las contraseñas coincidan
    if ($password !== $confirmar_password) {
        die("Las contraseñas no coinciden.");
    }

    // Llamada al procedimiento almacenado sp_InsertarCliente
    $sql = "CALL sp_InsertarCliente(?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssss", $nombre, $apellidos, $email, $dni, $telefono, $password,$confirmar_password);

    // Ejecutar la consulta preparada
    if ($stmt->execute()) {
        echo 'Registro exitoso'; // Agregar el punto y coma aquí
    } else {
        echo "Error al registrar cliente: " . $stmt->error;
    }
    
    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conexion->close();
?>
