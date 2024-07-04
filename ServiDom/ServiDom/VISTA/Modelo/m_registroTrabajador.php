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
    $apellido = $_POST['apellido'];
    $ocupacion = $_POST['ocupacion'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];
    $confirmar_password = $_POST['confirmar-password'];

    // Validar que las contraseñas coincidan
    if ($password !== $confirmar_password) {
        die("Las contraseñas no coinciden.");
    }

    // Llamada al procedimiento almacenado sp_InsertarTrabajador
    $sql = "CALL sp_InsertarTrabajador(?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssss", $nombre, $apellido, $ocupacion, $email, $dni, $telefono, $password, $confirmar_password);

    if ($stmt->execute()) {
        // Guardar el nombre completo del usuario
        $nombre_completo = $nombre . ' ' . $apellido;
    } else {
        echo "Error al registrar trabajador: " . $stmt->error;
    }
    
    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conexion->close();
header("Location: http://localhost/servidom/ServiDom/VISTA/V_login.php");
?>
